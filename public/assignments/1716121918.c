go get -u github.com/go-sql-driver/mysql





package main

import (
    "database/sql"
    "fmt"
    _ "github.com/go-sql-driver/mysql"
)

func main() {
    // Connect to the master database
    masterDB, err := sql.Open("mysql", "master_user:master_password@tcp(master_ip_address:3306)/master_database")
    if err != nil {
        panic(err.Error())
    }
    defer masterDB.Close()

    // Perform insert operation on master
    _, err = masterDB.Exec("INSERT INTO your_table (column1, column2) VALUES (?, ?)", value1, value2)
    if err != nil {
        panic(err.Error())
    }

    // Perform delete operation on master
    _, err = masterDB.Exec("DELETE FROM your_table WHERE condition")
    if err != nil {
        panic(err.Error())
    }

    fmt.Println("Insert and delete operations completed on master!")
}
********************************
slave 
***********************************
package main

import (
    "database/sql"
    "fmt"
    _ "github.com/go-sql-driver/mysql"
)

func main() {
    // Connect to the slave database
    slaveDB, err := sql.Open("mysql", "slave_user:slave_password@tcp(slave_ip_address:3306)/slave_database")
    if err != nil {
        panic(err.Error())
    }
    defer slaveDB.Close()

    // Set the master IP address
    masterIP := "master_ip_address"

    // Perform insert operation on slave
    _, err = slaveDB.Exec("INSERT INTO your_table (column1, column2) VALUES (?, ?)", value1, value2)
    if err != nil {
        panic(err.Error())
    }

    // Perform delete operation on slave
    _, err = slaveDB.Exec("DELETE FROM your_table WHERE condition")
    if err != nil {
        panic(err.Error())
    }

    // Configure slave replication
    _, err = slaveDB.Exec(fmt.Sprintf("CHANGE MASTER TO MASTER_HOST='%s', MASTER_USER='replication_user', MASTER_PASSWORD='your_password', MASTER_LOG_FILE='%s', MASTER_LOG_POS=%s", masterIP, masterLogFile, masterLogPosition))
    if err != nil {
        panic(err.Error())
    }

    // Start replication
    _, err = slaveDB.Exec("START SLAVE")
    if err != nil {
        panic(err.Error())
    }

    fmt.Println("Insert and delete operations completed on slave!")
}
**************************
notice:::
************************
replace "master_ip_address" with the actual IP address of the master device and ensure that you provide appropriate values for value1, value2, and the condition in the delete operation. Additionally, replace "your_table" with the actual table name.

replace "slave_ip_address" with the actual IP address of the slave device and "master_ip_address" with the IP address of the master device. Also, ensure that you have obtained the values of masterLogFile and masterLogPosition from the master device's setup and that they are used correctly in the replication configuration.
*******************************************
package main

import (
    "database/sql"
    "fmt"
    _ "github.com/go-sql-driver/mysql"
)

func main() {
    // Connect to the master database
    masterDB, err := sql.Open("mysql", "master_user:master_password@tcp(master_ip_address:3306)/master_database")
    if err != nil {
        panic(err.Error())
    }
    defer masterDB.Close()

    // Query for master status
    var masterLogFile, masterLogPosition string
    err = masterDB.QueryRow("SHOW MASTER STATUS").Scan(&masterLogFile, &masterLogPosition)
    if err != nil {
        panic(err.Error())
    }

    fmt.Println("Master log file:", masterLogFile)
    fmt.Println("Master log position:", masterLogPosition)
}
*************************
mysql -u username -p -h master_ip_address database
**************************
SHOW MASTER STATUS;
****************************
exit;

