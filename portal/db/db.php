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

        public function student_info($email){
            $info_query = "SELECT * FROM student_info WHERE email = '$email'";
            $info_res = mysqli_query($this->conn, $info_query);
            $student_info = mysqli_fetch_assoc($info_res);
            return $student_info;
        }

        public function student_classes($email){
            $query = "SELECT * FROM student_classes WHERE email = '$email'";
            $res = mysqli_query($this->conn, $query);
            $classes = [];

            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $classes[] = $row;
                }
            }
            return $classes;
        }

        public function find_id($email){
            $query = "SELECT id FROM student WHERE email = '$email'";
            $res = mysqli_query($this->conn, $query);
            if (mysqli_num_rows($res) > 0)
                $row = mysqli_fetch_assoc($res);

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

            return $classes;
        }
        
        public function already_enrolled($atten_id){
            
            $student_atten_ids = [];
            foreach($student_attens as $s_g)
                $student_atten_ids[] = $s_g['atten_id'];
            if (in_array($atten_id, $student_atten_ids)) return 1;
            return 0;
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
    
        public function enroll($stud_id, $atten_id){
            $query = "INSERT INTO student_atten VALUES('$stud_id', '$atten_id')";
            mysqli_query($this->conn, $query);
        }

        public function unenroll($stud_id, $atten_id){
            $query = "DELETE FROM student_atten WHERE student_id = $stud_id AND attendance_id = $atten_id";
            echo $query;
            mysqli_query($this->conn, $query);
        }

        public function check_login($email, $pw){
            
            $query = "SELECT email from student WHERE email='$email' AND pw='$pw'";
            $student = mysqli_query($this->conn, $query);
            if (gettype($student) != "boolean"){
                return mysqli_fetch_assoc($student);
            }
            else return 0;
        }

        function get_timetable($email){
            $classes_timetable = $this->get_classes($email, $this->conn);
            $rowspans = [1 => 1, 2 => 1, 3 => 1, 4 => 1, 5 => 1, 6 => 1, 7 => 1];

            $prev = -1;
            foreach ($classes_timetable as $c){
                foreach ($c as $key => $value){
                    if ($value == $prev) $rowspans[$value]++;
                        $prev = $value;
                    }
                }
            foreach ($rowspans as $k => $v) if ($v == 1) unset($rowspans[$k]);
            return $classes_timetable;
        }

        function get_classes($email){
            $query = "SELECT * FROM get_classes WHERE email = '$email'"; 
            $classes_timetable = [];
            $res = mysqli_query($this->conn, $query);
            if (mysqli_num_rows($res) > 0){
                while ($row = mysqli_fetch_assoc($res)){
                    unset($row['email']);
                    array_push($classes_timetable, $row);
                    }
                }
            return $classes_timetable;
        }

        public function close(){
            mysqli_close($this->conn);
        }
        
    }