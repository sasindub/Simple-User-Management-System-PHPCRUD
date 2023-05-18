<?php 
    require_once 'Database.php';

class user extends DataBase{

    protected $tableName = "userdetails";
 
    public function insert($name, $email, $tp, $address){

      if(isset($name) && isset($email) && isset($tp) && isset($address))
      {

        $sql_stmt = $this->conn->prepare("INSERT INTO {$this->tableName} (name,email,mobile,address) VALUES (:name, :email, :tp, :address)");

       $sql_stmt->bindParam(':name', $name);
       $sql_stmt->bindParam(':email', $email);
       $sql_stmt->bindParam(':tp', $tp);
       $sql_stmt->bindParam(':address', $address);



    $this->conn->beginTransaction();

    
    $this->conn->commit();
    $lastIsertedId = $this->conn->lastInsertId(); //getting the last inerted Id 

       try{

      if($sql_stmt->execute()){
        return $lastIsertedId;
      }else{
        return 'error';
      }
    }
    catch(PDOException $e){
        echo $e->getMessage();
        $this->conn->rollback();
    }

  }

    }

    function display(){
    
        $table = '<thead>
        <tr>
          <th scope="col">Sl no</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Mobile</th>
          <th scope="col">Place</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
      ';

      try{

        $sql = $this->conn->prepare("SELECT * from $this->tableName");

        $this->conn->beginTransaction();
        $this->conn->commit();
        if($sql->execute()){
        
          while($row=$sql->fetch(PDO::FETCH_ASSOC)){
            $id = $row['id'];
            $name =  $row['name'];
            $email = $row['email'];
            $mobile = $row['mobile'];
            $address = $row['address'];

            $table .= '
               <tr>
            
            <td>'.$id.'</td>
            <td>'.$name.'</td>
            <td>'.$email.'</td>
            <td>'.$mobile.'</td>
            <td>'.$address.'</td>
            <td>
              
              <button class="btn btn-sm btn-secondary rounded-0 up" id="'.$id.'" name="update" data-bs-toggle="modal" data-bs-target="#updatemodal">Update</button>
              <button class="del btn btn-sm btn-danger rounded-0" id="'.$id.'" name="delete">Delete</button>
              
              
            </td>
      
          </tr>';
          }
          $table .= '</tbody>';

          return $table;
        
        
       
      }
      

      }catch(PDOException $e){
        echo $e->getMessage();
        $this->conn->rollBack();
      }

    }

    function delete($id){

      try{
        $sql = $this->conn->prepare("DELETE FROM $this->tableName WHERE id = $id");

        if($sql->execute())
        return "done";
        else
        return "not done";
        


      }catch(PDOException $e){
        echo $e->getMessage();
        $this->conn->rollBack();
      }

     
    }


    function update($id){
      try{
        
        $sql = $this->conn->prepare("SELECT * FROM $this->tableName WHERE id = :id");
        $sql->bindParam(':id', $id);
        
        if($sql->execute()){
          if($row = $sql->fetch(PDO::FETCH_ASSOC)){
            $name = $row['name'];
            $address = $row['address'];
            $mobile = $row['mobile'];
            $email = $row['email'];
          }

       $myArr = array($name, $address, $mobile, $email);

       $myJSON = json_encode($myArr);
       return $myJSON;

        }

      }catch(PDOException $e){
        echo $e->getMessage();
        $this->conn->rollBack();
      }
    }

    function updateSubmit($data){
      try{
        $dat = json_decode($data);

        $sql = $this->conn->prepare("UPDATE $this->tableName SET name = :name, address = :adrs, email = :email, mobile = :mobile WHERE id = :id ");
        $sql->bindParam(':name', $dat[1]);
        $sql->bindParam(':id', $dat[0]);
        $sql->bindParam(':adrs', $dat[2]);
        $sql->bindParam(':email', $dat[3]);
        $sql->bindParam(':mobile',$dat[4]);

        $this->conn->beginTransaction();

        if($sql->execute()){
          $this->conn->commit();
          return "Updated Successfully";
        }else{
          return "Something went wrong";
        }



      }catch(PDOException $e){
        echo $e->getMessage();
        $this->conn->rollBack();
      }

    }

    function searching($search){

      $table = '<thead>
      <tr>
        <th scope="col">Sl no</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Mobile</th>
        <th scope="col">Place</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
    ';

      try{
        $s = '%'.$search.'%';
        $sql = $this->conn->prepare("SELECT * FROM $this->tableName WHERE name LIKE :search OR address LIKE :search OR email LIKE :search OR mobile LIKE :search");
        $sql->bindParam(":search", $s);

        if($sql->execute()){
          
          while($row=$sql->fetch(PDO::FETCH_ASSOC)){
            $name = $row['name'];
            $address = $row['address'];
            $email = $row['email'];
            $mobile = $row['mobile'];
            $id = $row['id'];


            $table .= '
            <tr>
         
         <td>'.$id.'</td>
         <td>'.$name.'</td>
         <td>'.$email.'</td>
         <td>'.$mobile.'</td>
         <td>'.$address.'</td>
         <td>
           
           <button class="btn btn-sm btn-secondary rounded-0 up" id="'.$id.'" name="update" data-bs-toggle="modal" data-bs-target="#updatemodal">Update</button>
           <button class="del btn btn-sm btn-danger rounded-0" id="'.$id.'" name="delete">Delete</button>
           
           
         </td>
   
       </tr>';

          }

          return $table;

        }

      }catch(PDOException $e){
        echo $e->getMessage();
        $this->conn->rollBack();
      }
    }

  }


