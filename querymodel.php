<?php
require __DIR__ . '/conf.php';

$conn = new mysqli($conf["database"]["host"], $conf["database"]["username"], $conf["database"]["password"]);
$database = $conf["database"]["dbname"];
mysqli_select_db($conn, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

class QueryModel {
    public function __construct($db) {
        $this->db = $db;
    }

    public function sanitizeInput($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    protected function checkEmailExists($email) {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM open_day WHERE email = ?");
        $stmt->bind_param("s", $email);
        if (!$stmt) {
            die("Prepare failed: " . $this->db->error);
        }
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
        return $count > 0;
    }
    public function insertOpenDayForm($name, $email) {
 
        if ($this->checkEmailExists($email)) {
            echo "<script>alert('Email already exists. Please use a different email.');</script>";
            return;
        }

        $stmt = $this->db->prepare("INSERT INTO open_day (name, email, date) VALUES (?, ?, NOW())");
        $stmt->bind_param("ss", $name, $email);
        if (!$stmt) {
            die("Prepare failed: " . $this->db->error);
        }
        $stmt->execute();
        $stmt->close();
    }

    public function getNameandAmount() {
        $stmt = $this->db->prepare("SELECT name,id FROM open_day ORDER BY ID DESC LIMIT 1");
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $stmt->close();
        return $data;
    }
}
?>