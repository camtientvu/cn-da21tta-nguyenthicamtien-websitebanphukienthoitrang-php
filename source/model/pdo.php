<?php
/* 
* Mở kết nối CSDL sử dụng PDO  
*/
function pdo_get_connection()
{
    $dburl = "mysql:host=localhost;dbname=doanchuyennganh;charset=utf8";
    $username = 'root';
    $password = '';



    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
/**
 * thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_execute($sql)
{
    // Lấy tất cả các tham số được truyền sau tham số đầu tiên (là câu lệnh SQL)
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        // Chuẩn bị câu lệnh SQL
        $stmt = $conn->prepare($sql);
        // Thực thi câu lệnh SQL với các giá trị tham số
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        // Giải phóng kết nối
        unset($conn);
    }
}



function pdo_execute_return_lastInsertId($sql)
{
    // Lấy tất cả các tham số được truyền sau tham số đầu tiên (là câu lệnh SQL)
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        // Chuẩn bị câu lệnh SQL
        $stmt = $conn->prepare($sql);
        // Thực thi câu lệnh SQL với các giá trị tham số
        $stmt->execute($sql_args);
        return $conn->lastInsertId();
    } catch (PDOException $e) {
        throw $e;
    } finally {
        // Giải phóng kết nối
        unset($conn);
    }
}


/**
 * thực thi câu lệnh truy vấn dữ liệu(SELECT)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng các bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

/**
 * thực thi câu lệnh truy vấn một bản ghi
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng các bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
function pdo_query_value1($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($rows)[0]; // Assuming there's at least one value
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

/**
 * thực thi câu lệnh truy vấn một giá trị
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return giá trị
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_value($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($rows)[0];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}