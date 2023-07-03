<?php
namespace classes;
class databaseTable {
    private $pdo;
    private $table;
    private $primaryKey;
    private $entityClass;
    private $entityConstructor;

    public function __construct($pdo, $table, $primaryKey, $entityClass = 'stdclass', $entityConstructor = []){
        $this->pdo = $pdo;
        $this->table = $table;
        $this->primaryKey = $primaryKey;
        $this->entityClass = $entityClass;
        $this->entityConstructor = $entityConstructor;
    }
//find function to show one specific item
    public function find($row, $value){
        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $row . ' = :value');
        $stmt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);

		$criteria = [
			'value' => $value
		];
		$stmt->execute($criteria);

		return $stmt->fetchAll();
    }
//function to show all items of a table
    public function findAll(){
        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);

		$stmt->execute();

		return $stmt->fetchAll();
    }
//function to show a maximum of 10 jobs in ascending order
    public function showSorted(){
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY closingDate ASC LIMIT 10';
        $stmt = $this->pdo->prepare($query);
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
//delete something from the database
    public function delete($row, $value){
        $values=[
            'value'=>$value
        ];
        $this->pdo->prepare('DELETE FROM '. $this->table .' WHERE '. $row .' = :value')->execute($values);
    }
//update something in the database
    public function update($record) {
        $query = 'UPDATE ' . $this->table . ' SET ';

        $parameters = [];
        foreach ($record as $key => $value) {
               $parameters[] = $key . ' = :' .$key;
        }

        $query .= implode(', ', $parameters);
        $query .= ' WHERE ' . $this->primaryKey . ' = :primaryKey';

        $record['primaryKey'] = $record[$this->primaryKey];

        $stmt = $this->pdo->prepare($query);

        $stmt->execute($record);
    }
//save function
    public function save($record) {
		try {
			if (empty($record[$this->primaryKey])) {
				unset($record[$this->primaryKey]);
			}
			$this->insert($record);
		}
		catch (\Exception $e) {
			$this->update($record);
		}
    }
//add something to the database
    public function insert($record) {
        $keys = array_keys($record);

        $values = implode(', ', $keys);
        $valuesWithColon = implode(', :', $keys);

        $query = 'INSERT INTO ' . $this->table . ' (' . $values . ') VALUES (:' . $valuesWithColon . ')';

        $stmt = $this->pdo->prepare($query);

        $stmt->execute($record);
    }

}