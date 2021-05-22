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

        function student_info($email){
            $info_query = "SELECT * FROM student_info WHERE email = '$email'";
            $info_res = mysqli_query($this->conn, $info_query);
            $student_info = mysqli_fetch_assoc($info_res);

            mysqli_close($this->conn);
            return $student_info;
        }

        public function find_id($email){
            $query = "SELECT id FROM student WHERE email = '$email'";

            $res = mysqli_query($this->conn, $query);
            if (mysqli_num_rows($res) > 0)
                $row = mysqli_fetch_assoc($res);
            mysqli_close($this->conn);
            return $row;
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
            mysqli_close($this->conn);
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
            mysqli_close($this->conn);
            return $groups;
        }

        public function enroll($stud_id, $atten_id){
            $query = "INSERT INTO student_atten VALUES('$stud_id', '$atten_id')";
            mysqli_query($this->conn, $query);
            mysqli_close($this->conn);
        }

    }