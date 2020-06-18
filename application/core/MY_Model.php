<?php
/**
 * @property CI_DB_query_builder $db
 */

abstract class MY_Model extends CI_Model
{
    protected $table;
    protected $primaryKey = 'id';
    protected $timestamps = true;

    protected abstract function setDataFromPost();

    protected function setFilters($filters = [])
    {
    	if (empty($filters)) {
    		return;
		}

        foreach ($filters as $field => $filter) {
            if (is_array($filter) && isset($filter['operator']) && isset($filter['field']) && isset($filter['value'])) {
				$this->db->{$filter['operator']}($filter['field'], $filter['value']);

            } else {
                $this->db->where($field, $filter);
            }
        }
    }
    public function count($filters = [])
    {
        $this->setFilters($filters);
        return $this->db->count_all_results($this->table);
    }
    public function items($filters = [], $limit = ITEMS_PER_PAGE, $offset = null, $resultType = 'object', $orderBy = null)
    {
		if ($orderBy) {
			$this->db->order_by($orderBy);
		}
        $this->setFilters($filters);
        $query = $this->db->get($this->table, $limit, $offset);
        return $query->result($resultType);
    }

    public function item($value, $field = 'id', $resultType = 'object')
    {
        $items = $this->items([$field => $value], 1, 0, $resultType);
        return count($items) ? $items[0] : null;
    }

    public function insert()
    {
        $this->setDataFromPost();

        if ($this->timestamps) {
            $this->created_at = CURRENT_DATETIME;
            $this->updated_at = CURRENT_DATETIME;
        }
        return $this->db->insert($this->table, $this);
    }

    public function update($id)
    {
        $this->setDataFromPost();
        if ($this->timestamps) {
            $this->updated_at = CURRENT_DATETIME;
        }
        unset($this->{$this->primaryKey}, $this->created_at);
        return $this->db->update($this->table, $this, [$this->primaryKey => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, [$this->primaryKey => $id]);
    }
}
