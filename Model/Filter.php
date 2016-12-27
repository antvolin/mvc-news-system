<?php
class Filter extends Entity
{
    protected function getTableName()
    {
        return "news";
    }

    public function getIds()
    {
        try {
            $stm = self::$db->query("SELECT news_id FROM news");
            $idsArray = $stm->fetchAll();
        } catch (PDOException $e) {
            new Logger('PDOErrors.txt', $e->getMessage());

            exit;
        }

        foreach ($idsArray as $id) {
            $collection[] = $id['news_id'];
        }

        return json_encode($collection);
    }
}

