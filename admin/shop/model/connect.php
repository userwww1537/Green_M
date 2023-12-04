<?php
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    class dao_con {
        public static function conn_db() {
            $sqlServer = "mysql:host=localhost; dbname=green_m8683;charset=utf8;collation=utf8_unicode_ci";
            $username = "root";
            $password = "";
    
            try {
                $conn = new PDO($sqlServer, $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo 'Ket noi database that bai do ' . $e->getMessage();
            }
            return $conn;
        }
    
        //Them Sua Xoa
        public static function conn_execute($sql) {
            $conn = self::conn_db();
            $sqlBindParam = array_slice(func_get_args(), 1);
            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute($sqlBindParam);
            } catch (PDOException $e) {
                throw $e;
            } finally {
                unset($conn);
            }
        }
    
        //Show Ra 1 Cai
        public static function conn_show_one($sql) {
            $conn = self::conn_db();
            $sqlBindParam = array_slice(func_get_args(), 1);
            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute($sqlBindParam);
                $ketqua = $stmt->fetch();
                return $ketqua;
            } catch (PDOException $e) {
                throw $e;
            } finally {
                unset($conn);
            }
        }
    
        //Show Nhieu Cai
        public static function conn_show_all($sql) {
            $conn = self::conn_db();
            $sqlBindParam = array_slice(func_get_args(), 1);
            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute($sqlBindParam);
                $ketqua = $stmt->fetchAll();
                return $ketqua;
            } catch (PDOException $e) {
                throw $e;
            } finally {
                unset($conn);
            }
        }
    }
?>