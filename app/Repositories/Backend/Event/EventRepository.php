<?php

namespace App\Repositories\Backend\Event;

use App\Models\Event\Event;
use DB;
use Auth;

class EventRepository {

    /**
     * Plan Model
     * 
     * @var object
     */
    public $model;

    /**
     * Construct
     * 
     */
    public function __construct() {
        $this->model = new Event();
    }

    /**
     * Get All Plans
     * @return array
     */
    public function getAllEvents() {
        return $this->model->get();
    }

    /**
     * Create
     * 
     * @param array $data 
     * @return boolean
     */
    public function create($data = array()) {        
        $data['event_admin']            = Auth::user()->id;
        $data['created_by']             = Auth::user()->id;
        $data['event_start_datetime']   = date('Y-m-d H:i:s', strtotime($data['event_start_datetime']));
        $data['event_end_datetime']     = date('Y-m-d H:i:s', strtotime($data['event_end_datetime']));
        
        if (is_array($data) && count($data)) {
            return $this->model->create($data);
        }

        return false;
    }

    /**
     * Get By Id
     * @param int $id
     * @return bool
     */
    public function getById($id = null) {
        if ($id) {
            return $this->model->find($id);
        }

        return false;
    }

    /**
     * Update
     * @param int $id  
     * @param array $data
     * @return bool
     */
    public function update($id = null, $data = array()) {
        $data['event_start_datetime']   = date('Y-m-d H:i:s', strtotime($data['event_start_datetime']));
        $data['event_end_datetime']     = date('Y-m-d H:i:s', strtotime($data['event_end_datetime']));
        
        if ($id && is_array($data) && count($data)) {
            $model = $this->model->find($id);

            return $model->update($data);
        }

        return false;
    }

    /**
     * DeleteItem
     * @param int $id
     * @return bool
     */
    public function deleteItem($id = null) {
        if ($id) {
            $model = $this->model->find($id);

            if ($model) {
                return $model->delete();
            }
        }

        return false;
    }
    
    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->model;
    }

}