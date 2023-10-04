<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tài khoản</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <link rel="stylesheet" href="./bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="./FrontEnd/style.css">
    <link rel="shortcut icon" type="image/png" href="img/logo.png" />
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        text-align: center;
    }

    th, td {
        padding: 10px 15px;
        text-align: center;
    }

    th {
        background-color: #007bff;
        color: #fff;
        text-align: center;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #d9edf7;
    }

    td a {
        color: #007bff;
        text-decoration: none;
    }

    td a:hover {
        text-decoration: underline;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>

</head>

<body>
    <?php
    include './sidebar_quantri.php';
    ?>
     <div class="content">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <div class="container-fluid bg-secondary">
                    <div class="hstack gap-2 ">
                        <div class="p-2"><h5>Quản lý tài khoản<h5></div>
                        <div class="p-2 ms-auto"><a href="themtaikhoan.php" class="btn btn-primary">Thêm</a></div>
                    </div>
                </div>
                <div class="accordion-body">
                    <!-- Bảng dữ liệu -->
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên truy cập</th>
                                <th>Email</th>
                                <th>Giới tính</th>
                                <th>Cấp bậc</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Kết nối đến cơ sở dữ liệu
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "noithat";

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            if ($conn->connect_error) {
                                die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
                            }

                            $sql = "SELECT id, ho_ten, email, gioi_tinh, cap_bac FROM user";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["ho_ten"] . "</td>";
                                    echo "<td>" . $row["email"] . "</td>";
                                    echo "<td>" . $row["gioi_tinh"] . "</td>";
                                    echo "<td>" . $row["cap_bac"] . "</td>";
                                    //echo "<td>Cấp bậc</td>"; // Bạn cần thêm cột này nếu có thông tin về cấp bậc
                                    echo "<td style='width: 100px;' align='center'><a class='fa-solid fa-pen-to-square' href='suataikhoan.php?id=" . $row["id"] . "'></a>&emsp;<a class='fa-solid fa-trash' href='xoataikhoan.php?id=" . $row["id"] . "'></a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "Không tìm thấy dữ liệu.";
                            }

                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>