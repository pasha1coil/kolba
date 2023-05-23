package main

import (
	"database/sql"
	"fmt"
	"html/template"
	"log"
	"net/http"

	_ "github.com/go-sql-driver/mysql"
)

type Svod struct {
	Last_name   string
	Name_real   string
	Patronymic  string
	Departament string
	Position    string
	Educator_id string
	All_value   string
}

type ResForPage struct {
	Last_name   string
	Name_real   string
	Patronymic  string
	Departament string
	Position    string
	Ball        string
}

type Balls struct {
	Ball string
}

var database *sql.DB

func main() {
	http.HandleFunc("/", ShowPage)
	http.HandleFunc("/tablegeneration", Find)

	re := http.ListenAndServe(":8080", nil)
	if re != nil {
		log.Fatal("ListenAndServe: ", re)
	}
}

func ShowPage(w http.ResponseWriter, r *http.Request) {
	tmpl, _ := template.ParseFiles("svodnayago.html")
	tmpl.ExecuteTemplate(w, "create", nil)
}

func Find(w http.ResponseWriter, r *http.Request) {
	tmpl, _ := template.ParseFiles("svodnayago.html")
	tmpl.ExecuteTemplate(w, "create", nil)

	department := r.FormValue("department")
	position := r.FormValue("position")
	fmt.Println(department, position)

	//конект к бд
	db, err := sql.Open("mysql", "root:@/server2")
	if err != nil {
		log.Println(err)
	}
	defer db.Close()

	srav := ""
	if department == "По всем кафедрам" {
		department = srav
	}
	if position == "По всем должностям" {
		position = srav
	}

	var arrayID []string

	if department != srav && position != srav {
		//Вытаскивание данных
		result, err := db.Query("SELECT educator_id FROM employees WHERE department =? AND position =?", department, position)
		if err != nil {
			log.Println(err)
		}
		for result.Next() {
			var svod Svod
			err := result.Scan(&svod.Educator_id)
			if err != nil {
				log.Println(err)
			}
			arrayID = append(arrayID, "0", svod.Educator_id)
		}
	} else if position != srav {
		result, err := db.Query("SELECT educator_id FROM employees WHERE position =?", position)
		if err != nil {
			log.Println(err)
		}
		for result.Next() {
			var svod Svod
			err := result.Scan(&svod.Educator_id)
			if err != nil {
				log.Println(err)
			}
			arrayID = append(arrayID, svod.Educator_id)
		}
	} else if department != srav {
		result, err := db.Query("SELECT educator_id FROM employees WHERE department =?", department)
		if err != nil {
			log.Println(err)
		}
		for result.Next() {
			var svod Svod
			err := result.Scan(&svod.Educator_id)
			if err != nil {
				log.Println(err)
			}
			arrayID = append(arrayID, svod.Educator_id)
		}
	} else {
		result, err := db.Query("SELECT educator_id FROM employees")
		if err != nil {
			log.Println(err)
		}
		for result.Next() {
			var svod Svod
			err := result.Scan(&svod.Educator_id)
			if err != nil {
				log.Println(err)
			}
			arrayID = append(arrayID, svod.Educator_id)
		}
	}
	var arrayBalls []string
	for i := 0; i < len(arrayID); i++ {
		result, err := db.Query("SELECT all_value,educator_id FROM eff_contract WHERE educator_id =?", arrayID[i])
		if err != nil {
			log.Println(err)
		}
		for result.Next() {
			var svod Svod
			err := result.Scan(&svod.All_value, &svod.Educator_id)
			if err != nil {
				log.Println(err)
			}
			arrayBalls = append(arrayBalls, svod.All_value, svod.Educator_id)
		}
	}

	if len(arrayBalls) == 2 {
		var arrayTofile = []ResForPage{}
		for z := 1; z < len(arrayBalls); z = z + 2 {
			result, err := db.Query("SELECT employees.last_name,employees.name_real,employees.patronymic,employees.position,employees.department, eff_contract.all_value FROM employees,eff_contract WHERE employees.educator_id =? AND eff_contract.educator_id =?", arrayBalls[z], arrayBalls[z])
			if err != nil {
				log.Println(err)
			}
			for result.Next() {
				var svod ResForPage
				err := result.Scan(&svod.Last_name, &svod.Name_real, &svod.Patronymic, &svod.Position, &svod.Departament, &svod.Ball)
				if err != nil {
					log.Println(err)
				}
				arrayTofile = append(arrayTofile, svod)
			}
		}
		t, _ := template.ParseFiles("tablegeneration.html")
		t.ExecuteTemplate(w, "create2", arrayTofile)
	} else {
		var arrayTofile = []ResForPage{}
		for z := 1; z < len(arrayBalls); z = z + 2 {
			result, err := db.Query("SELECT employees.last_name,employees.name_real,employees.patronymic,employees.position,employees.department, eff_contract.all_value FROM employees,eff_contract WHERE employees.educator_id =? AND eff_contract.educator_id =?", arrayBalls[z], arrayBalls[z])
			if err != nil {
				log.Println(err)
			}
			for result.Next() {
				var svod ResForPage
				err := result.Scan(&svod.Last_name, &svod.Name_real, &svod.Patronymic, &svod.Position, &svod.Departament, &svod.Ball)
				if err != nil {
					log.Println(err)
				}
				arrayTofile = append(arrayTofile, svod)
			}
		}
		t, _ := template.ParseFiles("tablegeneration.html")
		t.ExecuteTemplate(w, "create2", arrayTofile)
	}
}
