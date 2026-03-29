<?php
require_once __DIR__.'/../model/Don.php';

class DonController {
    private $modelDon, $modelBang14,$modelBang18,$modelBang19
    ,$modelBang20,$modelBang21,$modelBang22,$modelBang24,$modelBang25,$modelBang28,$modelBang30,$modelBang32,$modelBang33,$modelBang33_1,$modelBang34,$modelBang35,$modelBang36;

    public function __construct()
    {
        $this->modelDon = new Don();
    }                                           
    //hien thi danh sach don

    public function index()
 {
        $dons = $this->modelDon->getAll();
        require_once __DIR__.'/../view/DonList.php';
    }
    //Lấy dữ liệu truyền xuống cho model để thêm mới

    public function insert()
 {
        if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
 {
            $this->modelDon->insert( $_POST );
            header( 'location:index.php?action=self_managed' );
            exit;
        }
        require_once __DIR__.'/../view/DonAdd.php';
    }

    public function update( $id )
 {
        if ( $id <= 0 ) {
            header( 'location:index.php?action=self_managed' );
            exit;
        }

        if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
            $this->modelDon->update( $_POST );
            header( 'location:index.php?action=self_managed' );
            exit;
        }

        $don = $this->modelDon->getById( $id );
        if ( !$don ) {
            header( 'location:index.php?action=self_managed' );
            exit;
        }

        $donChildren = $this->modelDon->getChildDataForEdit( $id );

        require_once __DIR__.'/../view/DonAdd.php';

    }

    public function delete( $id ) {
        $this->modelDon->delete( $id );
        header( 'location:index.php?action=category' );
        exit;
    }

}

?>