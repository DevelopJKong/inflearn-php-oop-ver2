<?php
/**
 *  CREATE TABLE sessions(
 *  `id` VARCHAR(255) UNIQUE NOT NULL,
 *  `payload` TEXT,
 *  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
 *  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
 * );
 */

ini_set('session.gc_maxlifetime', 10);

/**
 * Session Handler Interface
 */
class DatabaseSessionHandler implements SessionHandlerInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function open($save_path, $session_name)
    {
        return true;
    }

    public function read($session_id)
    {
        $sth = $this->pdo->prepare('SELECT * FROM sessions WHERE `id` = :id ');
        if ($sth->execute([':id' => $session_id])) {
            if ($sth->rowCount() > 0) {
                $payload = $row->fetchObject()->payload;
            } else {
                $sth = $this->pdo->prepare('INSERT INTO sessions(`id`) VALUES(:id)');
                $sth->execute([':id' => $session_id]);
            }
        }
        return $payload ?? '';
    }

    public function write($session_id, $session_data)
    {
        return $this->pdo
            ->prepare('UPDATE sessions SET `payload` = :payload WHERE `id` = :id')
            ->execute([':payload' => $session_data, ':id' => $session_id]);
    }
    public function gc($maxlifetime)
    {
        $sth = $this->pdo->prepare('SELECT * FROM sessions');
        if($sth->execute()) {
            while($row = $sth->fetchObject()) {
                $timestamp = strtotime($row->created_at);
                var_dump(time() - $timestamp);
                if((time() - $timestamp) < $maxlifetime) {
                    $this->destroy($row->id);
                }
            }
            return true;
        }
        return false;
    }

    public function destroy(string $session_id): bool
    {
        return $this->pdo
            ->prepare('DELETE FROM sessions WHERE `id` =:id')
            ->execute([':id'=> $session_id]);
    }

    public function close()
    {
        return true;
    }


}


session_set_save_handler(new DatabaseSessionHandler(new PDO('mysql:dbname=phpblogoop;host=localhost;port=3306;','root','1234')));

session_start();

//$_SESSION['message'] = 'Hello, world';
//$_SESSION['foo'] = new stdClass();

session_gc();