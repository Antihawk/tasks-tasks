<?php  

class Model_add_task extends Model
{
    public $post_name, $post_email, $post_text, $file_name, $file_tmp_name, $file_size;
    public $uploadOk;
    
	public function send_data_toserver($post_name, $post_email, $post_text, $file_name, $file_tmp_name, $file_size)
	{	
        include "application/config/config.php";
        
        $this->post_name = $post_name;
        $this->post_email = $post_email;
        $this->post_text = $post_text;
        $this->file_name = $file_name;
        $this->file_tmp_name = $file_tmp_name;
        $this->file_size = $file_size;
        
        $target_dir = "images/";
        $no_image_name = "noimage.png";
        $this->uploadOk = 1;
        $rand_pref = rand(10000, 99999);
        $new_file_name = rand(10000, 99999);
        
        if ($this->file_name == ""){
            $target_file = $target_dir . $no_image_name;
        } else{
            $imageFileType = pathinfo($this->file_name, PATHINFO_EXTENSION);
            $target_file = $target_dir . $rand_pref . "_" . $new_file_name . "." . $imageFileType;
            
            $check = getimagesize($this->file_tmp_name);
            if($check !== false) {
                $this->uploadOk = 1;
            } else {
                $this->uploadOk = 0;
                return false;
            }

            if (file_exists($target_file)) {
                $this->uploadOk = 0;
                return false;
            }

            $file_max_size = 5242880;
            if ($this->file_size > $file_max_size) {
                $this->uploadOk = 0;
                return false;
            }

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                $this->uploadOk = 0;
                return false;
            }
        }
        
        if ($this->uploadOk == 0) {
            return false;
        } else {
            if ($this->file_name != "")
            {
                $maxWidth = 320;
                $maxHeight = 240;
                list($width, $height, $type, $attr) = getimagesize( $this->file_tmp_name );
                if ( $width > $maxWidth || $height > $maxHeight ) {
                    $fn = $this->file_tmp_name;
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
                        imagejpeg($dst, $this->file_tmp_name );
                    } else if( $imageFileType == "gif" ) {
                        imagegif($dst, $this->file_tmp_name );
                    } else if( $imageFileType == "png" ) {
                        imagepng( $dst, $this->file_tmp_name );
                    }
                    imagedestroy( $dst );
                }
                
                if (move_uploaded_file($this->file_tmp_name, $target_file)) {
                    $pictureName = $target_dir . $rand_pref . "_" . $new_file_name . "." . $imageFileType;
                    $sql = $this->get_sql($pictureName);         
                    mysqli_query($connection, $sql);
                    return true;
                }else{
                    return false;
                }
            }
            else {
                $pictureName = $target_dir . $no_image_name;
                $sql = $this->get_sql($pictureName);
                mysqli_query($connection, $sql);
                return true;
            }
             
        }
        
        
        
    }
    
    public function get_sql($pictureName){
        $sql = "INSERT INTO `tasks` (`name`, `email`, `text`, `image`, `done`) VALUES ('".$this->post_name."', '".$this->post_email."', '".$this->post_text."', '$pictureName', false)";
        return $sql;
    }

}

?>