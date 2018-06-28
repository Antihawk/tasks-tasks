<?php  

class Model_tasks extends Model
{  
	public function get_data_from_server($page = 1, $sort = "sort-by-name")
	{	
        include "application/config/config.php";
        $array_data = array();
        $array_data_tasks = array();
        $array_data_pages = array();
        $array_data_pages['page']  = $page;
        $array_data_pages['sort']  = $sort;
        
        $per_page = 3;
        $offset = ($page * $per_page) - $per_page;
        
        $total_count_q = mysqli_query($connection, "SELECT COUNT(`id`) AS `total_count` FROM `tasks`");
        $total_count = mysqli_fetch_assoc($total_count_q);
        $total_count = $total_count['total_count'];
        $total_pages = ceil($total_count / $per_page);
        $array_data_pages['total_pages'] = $total_pages;
         
        $sort_q = $this->get_sort($sort);
        $tasks_query = mysqli_query($connection, "SELECT * FROM `tasks` ORDER BY ".$sort_q." LIMIT $offset, $per_page");
        
        while ($tasks = mysqli_fetch_assoc($tasks_query)){
            $array_data_tasks[] = $tasks;
        }
        if(mysqli_num_rows($tasks_query) <= 0){
            $array_data_pages['tasks_exist']  = 0;
        }
        else {
            $array_data_pages['tasks_exist']  = 1;
        }
        
        $array_data['1'] = $array_data_tasks;
        $array_data['2'] = $array_data_pages;
        
        return $array_data;
    }
    
    private function get_sort($sort){
        switch($sort){
            case "sort-by-name": 
                $sort_q = "`name`";
                break;
            case "sort-by-name-desc": 
                $sort_q = "`name` DESC";
                break;
            case "sort-by-email": 
                $sort_q = "`email`";
                break;
            case "sort-by-email-desc": 
                $sort_q = "`email` DESC";
                break;
            case "sort-by-status": 
                $sort_q = "`done`";
                break;
            case "sort-by-status-desc": 
                $sort_q = "`done` DESC";
                break;
            default: $sort_q = "name";
        }
        return $sort_q;
    }
    
    
    public function update_data_onserver($post_id, $post_name, $post_email, $post_text, $post_checkbox, $file_name, $file_tmp_name, $file_size, $old_image_name)
	{	
        include "application/config/config.php";
        
        $target_dir = "images/";
        $no_image = false;
        $uploadOk = 1;
        $rand_pref = rand(10000, 99999);
        $new_file_name = rand(10000, 99999);
        
        if ($post_checkbox == 1){
            $post_done = "TRUE";
        }
        else {
            $post_done = "FALSE";
        }
        if ($file_name == ""){
            $no_image = true;
        } else{
            $imageFileType = pathinfo($file_name, PATHINFO_EXTENSION);
            $target_file = $target_dir . $rand_pref . "_" . $new_file_name . "." . $imageFileType;
            
            $check = getimagesize($file_tmp_name);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
                return false;
            }

            if (file_exists($target_file)) {
                $uploadOk = 0;
                return false;
            }

            $file_max_size = 5242880;
            if (file_size > $file_max_size) {
                $uploadOk = 0;
                return false;
            }

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                $uploadOk = 0;
                return false;
            }
        }
        
        if ($uploadOk == 0) {
            return false;
        } else {
            if ($file_name != "")
            {
                $maxWidth = 320;
                $maxHeight = 240;
                list($width, $height, $type, $attr) = getimagesize( $file_tmp_name );
                if ( $width > $maxWidth || $height > $maxHeight ) {
                    $fn = $file_tmp_name;
                    $size = getimagesize( $fn );
                    $ratio = $size[0] / $size[1]; // width/height
                    if( $ratio > 1) {
                        $width = $maxWidth;
                        $height = ($maxWidth * $size[1]) / $size[0];
                    } else {
                        $width = ($maxHeight * $size[0]) / $size[1];
                        $height = $maxHeight;
                    }
                    $src = imagecreatefromstring( file_get_contents( $fn ) );
                    $dst = imagecreatetruecolor( $width, $height );
                    imagecopyresampled( $dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );
                    imagedestroy( $src );
                    
                    if( $imageFileType == "jpg" || $imageFileType == "jpeg" ) {
                        imagejpeg($dst, $file_tmp_name );
                    } else if( $imageFileType == "gif" ) {
                        imagegif($dst, $file_tmp_name );
                    } else if( $imageFileType == "png" ) {
                        imagepng( $dst, $file_tmp_name );
                    }
                    imagedestroy( $dst );
                }
                
                if (move_uploaded_file($file_tmp_name, $target_file)) {
                    $pictureName = $target_dir . $rand_pref . "_" . $new_file_name . "." . $imageFileType;
                    if ($old_image_name != "images/noimage.png") {
                        unlink($old_image_name);
                    }
                    
                    $sql = "UPDATE `tasks` SET `name`='".$post_name."',`email`='".$post_email."',`text`='".$post_text."',`image`='".$pictureName."',`done`=".$post_done." WHERE `id`='".$post_id."'";
                    
                    mysqli_query($connection, $sql);
                    return true;
                }else{
                    return false;
                }
            }
            else {
                $sql = "UPDATE `tasks` SET `name`='".$post_name."',`email`='".$post_email."',`text`='".$post_text."',`done`=".$post_done." WHERE `id`='".$post_id."'";
                mysqli_query($connection, $sql);
                return true;
            }
        }
    }

}

?>