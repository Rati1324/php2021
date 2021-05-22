<?php
    class Database{
        protected $servername;
        protected $username;
        protected $password;
        protected $dbname;
        protected $conn;

        public function __construct($servername = "localhost", $username = "gau", $password = "gau123456", $dbname="portal")
        {
            $this->servername = $servername;
            $this->username = $username;
            $this->password = $password;
            $this->dbname = $dbname;
            $this->conn = new mysqli($servername, $username, $password, $dbname);
        }

        function student_info($conn, $email){
            $info_query = "SELECT * FROM student WHERE email = '$email'";
            $info_res = mysqli_query($conn, $info_query);
            $student_info = mysqli_fetch_assoc($info_res);
            $school_query = "SELECT name FROM school JOIN student
                ON school.school_id = student.school_id
                WHERE student.email = '$email'
                ";
            $school_query = mysqli_query($conn, $school_query);
            $school_res = mysqli_fetch_assoc($school_query)['name'];
            return [$student_info, $school_res];
        }

        public function find_id($email){
            $query = "SELECT id FROM student WHERE email = '$email'";

            $res = $this->conn->query($query);
            if ($res->num_rows > 0)
                return $res->fetch_assoc();
                    
        }

        public function classes(){
            $query_class = "SELECT c_name, lec_name, credit, code, class_id FROM classes";
            $res_class = mysqli_query($this->conn, $query_class);

            $classes = [];
            if (mysqli_num_rows($res_class) > 0) {
                while ($row = mysqli_fetch_assoc($res_class)) {
                    if (!isset($classes[$row['class_id']]))
                        $classes[$row['class_id']] = $row;
                }
            }
            return $classes;
        }

        public function groups(){
            $query_group = "SELECT * FROM groups";
            $res_group = mysqli_query($this->conn, $query_group);
            $groups = [];
            if (mysqli_num_rows($res_group) > 0) {
                while ($row = mysqli_fetch_assoc($res_group)) {
                    if (isset($groups[$row['id']])) $groups[$row['id']][] = $row;
                    else $groups[$row['id']] = [$row];
                }
            }
            return $groups;
        }
    }