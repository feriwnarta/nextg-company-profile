<?php


class ContactUs extends Controller
{
    public function index()
    {
        $this->view('templates/header_view');
        $this->view('contact_us/contact_us_view');
        $this->view('templates/button_scroll_top_view');
        $this->view('components/cta-component');
        $this->view('templates/footer_view');
    }

    public function offering() {


        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['project_detail']) && isset($_FILES['attachment'])) {

            $attachment = $_FILES['attachment'];


            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $projectDetail = $_POST['project_detail'];

            $status = $this->moveUploadFile($attachment);

            if($status == 'size melebihi kapasitas') {
                echo 'size lebih';
            } else if ($status == 'gagal pindah file') {
                echo 'gagal pindah file';
            } else if ( $status == 'ekstensi tidak diperbolehkan') {
                echo 'ekstensi tidak diperbolehkan';
            } else {
                $this->service('ContactUsServices');
                $contactService = new ContactUsServices($name, $email, $subject, $status, $projectDetail);
                $result = $contactService->sendOffer();
                echo $result;
            }
        }

    }

    function moveUploadFile($attachment) {


        $target = 'file_attachment/';

        $name = basename($attachment['name']);
        $temp = $attachment['tmp_name'];
        $size = $attachment['size'];
        $extension = pathinfo($name, PATHINFO_EXTENSION);

        $notAllowedExtension = array (
            'exe', 'apk', 'lib'
        );

        if(!in_array($extension, $notAllowedExtension)) {

            if($size > 5000000) {
                return  'size melebihi kapasitas';
            }

            $target .= $name;
            // move uploaded file
            if(move_uploaded_file($temp, $target)) {
                return  $target;
            }

            return 'gagal pindah file';

        }

        return 'ekstensi tidak diperbolehkan';
    }
}
