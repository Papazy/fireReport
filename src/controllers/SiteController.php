<?php
namespace MyApp\Controllers;

use MyApp\Models\Site;
use MyApp\Core\BaseController;

class SiteController extends BaseController
{

  public function index()
  {
    $siteModel = new Site();
    $data = $siteModel->getAll();
    $this->view('admin/manage-site', ['data' => $data]);
}

public function updateSite()
{
    if (isset($_POST['submit'])) {
        $wtitle = $_POST['webtitle'];
        $cphoto = $_POST['currentphoto'];
        $imgfile = $_FILES["image"]["name"];
        $currentppath = BASEURL."/img/uploadeddata/" . $cphoto;
        $extension = strtolower(pathinfo($imgfile, PATHINFO_EXTENSION));
        $allowed_extensions = ["jpg", "jpeg", "png", "gif"];
        var_dump($currentppath);
        var_dump($cphoto);
        var_dump($imgfile);
        var_dump($extension);

        if (!in_array($extension, $allowed_extensions)) {
            $status = 0;
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {
            $imgnewfile = md5($imgfile) . '.' . $extension;
            move_uploaded_file($_FILES["image"]["tmp_name"], __DIR__."/../../public/img/uploadeddata/" . $imgnewfile);
            $siteModel = new Site();
            $siteModel->update(['siteTitle' => $wtitle, 'siteLogo' => $imgnewfile, 'id' => 1]);
            unlink($currentppath);
            $status = 1;
            echo "<script>alert('Website Details Updated');</script>";
            $this->redirect('/admin/manage-site');
        }
    }
}

}