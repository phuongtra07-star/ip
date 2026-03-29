<?php
require_once __DIR__.'/Connect.php';

class Don {
    private $conn;
    private $primaryKeyColumn;

    public function __construct()
 {
        $this->conn = Connect::getConnection();
    }

    public function getAll()
 {
        $sql = 'Select * from Don order by f10_so_don';
        $stmt = $this->conn->prepare( $sql );
        $stmt->execute();
        return $stmt->fetchAll( PDO::FETCH_ASSOC );
    }

    public function insert( $data )
 {
        try {
            $this->conn->beginTransaction();

            $sql = 'INSERT INTO Don (
                f0, f1_loai_ho_so, f2_our_ref, f3_your_ref, f4_tong_diem_doc_lap,
                f5_id_khach_hang, f6_ten_khach_hang, f7_uy_quyen, f8_ban_sao,
                f9_reference_data, f10_so_don, f11_ngay_nop_don, f12_so_bang,
                f13_ngay_cap_bang, f15_ten_doi_tuong, f16_phan_loai, f17_noi_nop,
                f23_thong_tin_bo_sung, f26_chap_nhan_ht, f27_cong_bo_don,
                f29_1_chap_nhan_cb, f29_2_deadline_nop_phi, f29_3_gia_han_nop_phi,
                f29_4_deadline_nop_phi, f29_5_ngay_dong_phi, f29_6_ngay_gui_bang,
                f31_ma_duy_tri_gia_han
            ) VALUES (
                ?, ?, ?, ?, ?,
                ?, ?, ?, ?,
                ?, ?, ?, ?,
                ?, ?, ?, ?,
                ?, ?, ?,
                ?, ?, ?,
                ?, ?, ?,
                ?
            )';

            $stmtDon = $this->conn->prepare( $sql );
            $stmtDon->execute( [
                $this->toNullable( $data['f0'] ?? 1 ),
                $this->toNullable( $data['f1_loai_ho_so'] ?? null ),
                $this->toNullable( $data['f2_our_ref'] ?? null ),
                $this->toNullable( $data['f3_your_ref'] ?? null ),
                $this->toNullable( $data['f4_tong_diem_doc_lap'] ?? null ),
                $this->toNullable( $data['f5_id_khach_hang'] ?? null ),
                $this->toNullable( $data['f6_ten_khach_hang'] ?? null ),
                $this->toNullable( $data['f7_uy_quyen'] ?? null ),
                $this->toNullable( $data['f8_ban_sao'] ?? null ),
                $this->toNullable( $data['f9_reference_data'] ?? null ),
                $this->toNullable( $data['f10_so_don'] ?? null ),
                $this->toNullable( $data['f11_ngay_nop_don'] ?? null ),
                $this->toNullable( $data['f12_so_bang'] ?? null ),
                $this->toNullable( $data['f13_ngay_cap_bang'] ?? null ),
                $this->toNullable( $data['f15_ten_doi_tuong'] ?? null ),
                $this->toNullable( $data['f16_phan_loai'] ?? null ),
                $this->toNullable( $data['f17_noi_nop'] ?? null ),
                $this->toNullable( $data['f23_thong_tin_bo_sung'] ?? null ),
                $this->toNullable( $data['f26_chap_nhan_ht'] ?? null ),
                $this->toNullable( $data['f27_cong_bo_don'] ?? null ),
                $this->toNullable( $data['f29_1_chap_nhan_cb'] ?? null ),
                $this->toNullable( $data['f29_2_deadline_nop_phi'] ?? null ),
                $this->toNullable( $data['f29_3_gia_han_nop_phi'] ?? null ),
                $this->toNullable( $data['f29_4_deadline_nop_phi'] ?? null ),
                $this->toNullable( $data['f29_5_ngay_dong_phi'] ?? null ),
                $this->toNullable( $data['f29_6_ngay_gui_bang'] ?? null ),
                $this->toNullable( $data['f31_ma_duy_tri_gia_han'] ?? null )
            ] );

            $idDon = (int)$this->conn->lastInsertId();

            $this->insertChildRows( 'Bang14', $idDon, [
                'f14_1_mota' => $data['f14_1_mota'] ?? [],
                'f14_2_ngay_lien_quan' => $data['f14_2_ngay_lien_quan'] ?? [],
                'f14_3_ghi_chu' => $data['f14_3_ghi_chu'] ?? []
            ] );

            $this->insertChildRows( 'Bang18', $idDon, [
                'f18_1_ten_chu_don' => $data['f18_1_ten_chu_don'] ?? [],
                'f18_2_dia_chi_chu_don' => $data['f18_2_dia_chi_chu_don'] ?? [],
                'f18_3_quoc_gia_chu_don' => $data['f18_3_quoc_gia_chu_don'] ?? [],
                'f18_4_mst_cc' => $data['f18_4_mst_cc'] ?? [],
                'f18_5_id_chu_don' => $data['f18_5_id_chu_don'] ?? []
            ] );

            $this->insertChildRows( 'Bang19', $idDon, [
                'f19_1_tac_gia' => $data['f19_1_tac_gia_1'] ?? [],
                'f19_2_dia_chi_tac_gia' => $data['f19_2_dia_chi_tac_gia'] ?? [],
                'f19_3_quoc_tich_tac_gia' => $data['f19_3_quoc_tich_tac_gia'] ?? [],
                'f19_4_email_tac_gia' => $data['f19_4_email_tac_gia'] ?? [],
                'f19_5_dien_thoai_tac_gia' => $data['f19_5_dien_thoai_tac_gia'] ?? [],
                'f19_6_can_cuoc_tac_gia' => $data['f19_6_can_cuoc_tac_gia'] ?? []
            ] );

            $bang20Col3 = $this->detectBang20Col3();
            $bang20ValuesCol3 = $bang20Col3 === 'f20_3_ghi_chu'
                ? ( $data['f20_3_ghi_chu'] ?? [] )
                : ( $data['f20_3_ngay_nop_tham_chieu'] ?? [] );
            $this->insertChildRows( 'Bang20', $idDon, [
                'f20_1_so_don_tham_chieu' => $data['f20_1_so_don_tham_chieu'] ?? [],
                'f20_2_ngay_nop_tham_chieu' => $data['f20_2_ngay_nop_tham_chieu'] ?? [],
                $bang20Col3 => $bang20ValuesCol3
            ] );

            $this->insertChildRows( 'Bang21', $idDon, [
                'f21_1_so_don_uu_tien' => $data['f21_1_so_don_uu_tien'] ?? [],
                'f21_2_ngay_uu_tien' => $data['f21_2_ngay_uu_tien'] ?? [],
                'f21_3_ma_nuoc' => $data['f21_3_ma_nuoc'] ?? []
            ] );

            $this->insertChildRows( 'Bang22', $idDon, [
                'f22_1_ten' => $data['f22_1_ten'] ?? [],
                'f22_2_email' => $data['f22_2_email'] ?? [],
                'f22_3_dien_thoai' => $data['f22_3_dien_thoai'] ?? [],
                'f22_4_ghi_chu' => $data['f22_4_ghi_chu'] ?? []
            ] );

            $this->insertChildRows( 'Bang24', $idDon, [
                'f24_1_ten' => $data['f24_1_ten'] ?? [],
                'f24_2_ngay' => $data['f24_2_ngay'] ?? [],
                'f24_3_ghi_chu' => $data['f24_3_ghi_chu'] ?? []
            ] );

            $this->insertChildRows( 'Bang25', $idDon, [
                'f25_1thongbao_ht' => $data['f25_1thongbao_ht'] ?? [],
                'f25_2_deadline_ht' => $data['f25_2_deadline_ht'] ?? [],
                'f25_3_giahan_ht' => $data['f25_3_giahan_ht'] ?? [],
                'f25_4_deadline_gh' => $data['f25_4_deadline_gh'] ?? [],
                'f25_5_ngay_phuc_dap' => $data['f25_5_ngay_phuc_dap'] ?? []
            ] );

            $this->insertChildRows( 'Bang28', $idDon, [
                'f28_1_thong_bao_nd' => $data['f28_1_thong_bao_nd'] ?? [],
                'f28_2_deadline_nd' => $data['f28_2_deadline_nd'] ?? [],
                'f28_3_giahan_nd' => $data['f28_3_giahan_nd'] ?? [],
                'f28_4_deadline_gh' => $data['f28_4_deadline_gh'] ?? [],
                'f28_5_ngay_phuc_dap' => $data['f28_5_ngay_phuc_dap'] ?? []
            ] );

            $this->insertChildRows( 'Bang30', $idDon, [
                'f30_1_mo_ta_su_viec' => $data['f30_1_mo_ta_su_viec'] ?? [],
                'f30_2_ngay_phat_sinh' => $data['f30_2_ngay_phat_sinh'] ?? [],
                'f30_3_deadline' => $data['f30_3_deadline'] ?? [],
                'f30_4_ngay_xu_ly' => $data['f30_4_ngay_xu_ly'] ?? [],
                'f30_5_ghi_chu' => $data['f30_5_ghi_chu'] ?? []
            ] );

            $this->insertChildRows( 'Bang32', $idDon, [
                'f32_1_vn_deadline_duy_tri_nam' => $data['f32_1_vn_deadline_duy_tri_nam'] ?? [],
                'f32_2_vn_ngay_nop_duy_tri_nam' => $data['f32_2_vn_ngay_nop_duy_tri_nam'] ?? [],
                'f32_3_vn_trangthai' => $data['f32_3_vn_trangthai'] ?? []
            ] );

            $this->insertBang33AndBang33_1( $idDon, $data );

            $this->insertChildRows( 'Bang34', $idDon, [
                'f34_1_ten_tai_lieu' => $data['f34_1_ten_tai_lieu'] ?? [],
                'f34_2_so_tai_lieu' => $data['f34_2_so_tai_lieu'] ?? [],
                'f34_3_ngay_phat_hanh' => $data['f34_3_ngay_phat_hanh'] ?? [],
                'f34_4_ghi_chu' => $data['f34_4_ghi_chu'] ?? []
            ] );

            $this->insertChildRows( 'Bang35', $idDon, [
                'f35_1_ten_tai_lieu' => $data['f35_1_ten_tai_lieu'] ?? [],
                'f35_2_so_tai_lieu' => $data['f35_2_so_tai_lieu'] ?? [],
                'f35_3_nguoi_gui' => $data['f35_3_nguoi_gui'] ?? [],
                'f35_4_ngay_nhan' => $data['f35_4_ngay_nhan'] ?? [],
                'f35_5_ghi_chu' => $data['f35_5_ghi_chu'] ?? []
            ] );

            $this->insertChildRows( 'Bang36', $idDon, [
                'f36_1_ten_tai_lieu' => $data['f36_1_ten_tai_lieu'] ?? [],
                'f36_2_so_tai_lieu' => $data['f36_2_so_tai_lieu'] ?? [],
                'f36_3_nguoi_nhan' => $data['f36_3_nguoi_nhan'] ?? [],
                'f36_4_ngay_gui' => $data['f36_4_ngay_gui'] ?? [],
                'f36_5_ghi_chu' => $data['f36_5_ghi_chu'] ?? []
            ] );

            $this->conn->commit();
            return $idDon;
        } catch ( PDOException $e ) {
            if ( $this->conn->inTransaction() ) {
                $this->conn->rollBack();
            }
            echo 'Lỗi: ' . $e->getMessage();
            return null;
        }
    }

    private function toNullable( $value )
 {
        if ( !isset( $value ) ) {
            return null;
        }
        if ( is_string( $value ) && trim( $value ) === '' ) {
            return null;
        }
        return $value;
    }

    private function insertSingleChildRow( $table, $idDon, $rowData )
 {
        $columns = array_keys( $rowData );
        $values = [];

        foreach ( $rowData as $value ) {
            $values[] = $this->toNullable( $value );
        }

        if ( !$this->hasAnyValue( $values ) ) {
            return;
        }

        $placeholders = implode( ',', array_fill( 0, count( $columns ) + 1, '?' ) );
        $sql = 'INSERT INTO ' . $table . ' (id_don,' . implode( ',', $columns ) . ') VALUES (' . $placeholders . ')';
        $stmt = $this->conn->prepare( $sql );
        $stmt->execute( array_merge( [ $idDon ], $values ) );
    }

    private function insertChildRows( $table, $idDon, $columnsToFormValues )
 {
        $columns = array_keys( $columnsToFormValues );
        $maxRows = 0;

        foreach ( $columnsToFormValues as $values ) {
            $arr = is_array( $values ) ? $values : [ $values ];
            $maxRows = max( $maxRows, count( $arr ) );
        }

        if ( $maxRows === 0 ) {
            return;
        }

        $placeholders = implode( ',', array_fill( 0, count( $columns ) + 1, '?' ) );
        $sql = 'INSERT INTO ' . $table . ' (id_don,' . implode( ',', $columns ) . ') VALUES (' . $placeholders . ')';
        $stmt = $this->conn->prepare( $sql );

        for ( $i = 0; $i < $maxRows; $i++ ) {
            $row = [];
            foreach ( $columnsToFormValues as $values ) {
                $arr = is_array( $values ) ? $values : [ $values ];
                $row[] = $this->toNullable( $arr[$i] ?? null );
            }

            if ( !$this->hasAnyValue( $row ) ) {
                continue;
            }
            

            $stmt->execute( array_merge( [ $idDon ], $row ) );
        }
    }

    private function insertBang33AndBang33_1( $idDon, $data )
 {
        $maVuViecs = is_array( $data['f33_1_ma_vu_viec'] ?? null ) ? $data['f33_1_ma_vu_viec'] : [];
        $moTa = is_array( $data['f33_1_1_mo_ta_su_viec'] ?? null ) ? $data['f33_1_1_mo_ta_su_viec'] : [];
        $ngayPhatSinh = is_array( $data['f33_1_2_ngay_phat_sinh'] ?? null ) ? $data['f33_1_2_ngay_phat_sinh'] : [];
        $deadline = is_array( $data['f33_1_3_deadline'] ?? null ) ? $data['f33_1_3_deadline'] : [];
        $ngayXuLy = is_array( $data['f33_1_4_ngay_xu_ly'] ?? null ) ? $data['f33_1_4_ngay_xu_ly'] : [];
        $ghiChu = is_array( $data['f33_1_5_ghi_chu'] ?? null ) ? $data['f33_1_5_ghi_chu'] : [];
        $parentIndexes = is_array( $data['f33_1_parent_index'] ?? null ) ? $data['f33_1_parent_index'] : [];

        $stmt33 = $this->conn->prepare( 'INSERT INTO Bang33 (id_don, f33_1_ma_vu_viec) VALUES (?, ?)' );
        $stmt331 = $this->conn->prepare( 'INSERT INTO Bang33_1 (id_33, f33_1_1_mo_ta_su_viec, f33_1_2_ngay_phat_sinh, f33_1_3_deadline, f33_1_4_ngay_xu_ly, f33_1_5_ghi_chu) VALUES (?, ?, ?, ?, ?, ?)' );

        // Backward compatibility: when parent index is missing, keep previous 1-1 behavior.
        if ( empty( $parentIndexes ) ) {
            $maxRows = max( count( $maVuViecs ), count( $moTa ), count( $ngayPhatSinh ), count( $deadline ), count( $ngayXuLy ), count( $ghiChu ) );
            for ( $i = 0; $i < $maxRows; $i++ ) {
                $maVuViec = $this->toNullable( $maVuViecs[$i] ?? null );
                $row331 = [
                    $this->toNullable( $moTa[$i] ?? null ),
                    $this->toNullable( $ngayPhatSinh[$i] ?? null ),
                    $this->toNullable( $deadline[$i] ?? null ),
                    $this->toNullable( $ngayXuLy[$i] ?? null ),
                    $this->toNullable( $ghiChu[$i] ?? null )
                ];

                if ( !$this->hasAnyValue( array_merge( [ $maVuViec ], $row331 ) ) ) {
                    continue;
                }

                $stmt33->execute( [ $idDon, $maVuViec ] );
                $id33 = (int)$this->conn->lastInsertId();
                if ( $this->hasAnyValue( $row331 ) ) {
                    $stmt331->execute( array_merge( [ $id33 ], $row331 ) );
                }
            }
            return;
        }

        $childrenByParent = [];
        $maxChildRows = max( count( $moTa ), count( $ngayPhatSinh ), count( $deadline ), count( $ngayXuLy ), count( $ghiChu ), count( $parentIndexes ) );
        for ( $i = 0; $i < $maxChildRows; $i++ ) {
            $row331 = [
                $this->toNullable( $moTa[$i] ?? null ),
                $this->toNullable( $ngayPhatSinh[$i] ?? null ),
                $this->toNullable( $deadline[$i] ?? null ),
                $this->toNullable( $ngayXuLy[$i] ?? null ),
                $this->toNullable( $ghiChu[$i] ?? null )
            ];

            if ( !$this->hasAnyValue( $row331 ) ) {
                continue;
            }

            $parentIndex = (int)( $parentIndexes[$i] ?? 0 );
            if ( $parentIndex <= 0 ) {
                $parentIndex = 1;
            }

            if ( !isset( $childrenByParent[$parentIndex] ) ) {
                $childrenByParent[$parentIndex] = [];
            }
            $childrenByParent[$parentIndex][] = $row331;
        }

        $maxParentIndex = count( $maVuViecs );
        if ( !empty( $childrenByParent ) ) {
            $maxParentIndex = max( $maxParentIndex, max( array_keys( $childrenByParent ) ) );
        }

        for ( $parentIndex = 1; $parentIndex <= $maxParentIndex; $parentIndex++ ) {
            $maVuViec = $this->toNullable( $maVuViecs[$parentIndex - 1] ?? null );
            $rows331 = $childrenByParent[$parentIndex] ?? [];

            if ( !$this->hasAnyValue( [ $maVuViec ] ) && empty( $rows331 ) ) {
                continue;
            }

            $stmt33->execute( [ $idDon, $maVuViec ] );
            $id33 = (int)$this->conn->lastInsertId();

            foreach ( $rows331 as $row331 ) {
                $stmt331->execute( array_merge( [ $id33 ], $row331 ) );
            }
        }
    }

    private function hasAnyValue( $values )
 {
        foreach ( $values as $value ) {
            if ( $value !== null && $value !== '' ) {
                return true;
            }
        }
        return false;
    }

    private function detectBang20Col3()
 {
        $check = $this->conn->query( "SHOW COLUMNS FROM Bang20 LIKE 'f20_3_ghi_chu'" );
        if ( $check && $check->fetch() ) {
            return 'f20_3_ghi_chu';
        }
        return 'f20_3_ngay_nop_tham_chieu';
    }

    private function getPrimaryKeyColumn()
 {
        if ( !empty( $this->primaryKeyColumn ) ) {
            return $this->primaryKeyColumn;
        }

        $candidates = [ 'id_don', 'id', 'ma_don' ];
        foreach ( $candidates as $column ) {
            $stmt = $this->conn->query( "SHOW COLUMNS FROM Don LIKE '" . $column . "'" );
            if ( $stmt && $stmt->fetch() ) {
                $this->primaryKeyColumn = $column;
                return $this->primaryKeyColumn;
            }
        }

        $this->primaryKeyColumn = 'id_don';
        return $this->primaryKeyColumn;
    }

    public function getById( $id )
 {
        $pk = $this->getPrimaryKeyColumn();
        $sql = 'select * from Don where ' . $pk . ' = ?';
        $stmt = $this->conn->prepare( $sql );
        $stmt->execute( [ $id ] );
        return $stmt->fetch( PDO::FETCH_ASSOC );
    }

    private function tableExists( $table )
 {
        $stmt = $this->conn->prepare( 'SHOW TABLES LIKE ?' );
        $stmt->execute( [ $table ] );
        return (bool)$stmt->fetch();
    }

    private function columnExists( $table, $column )
 {
        if ( !$this->tableExists( $table ) ) {
            return false;
        }

        $stmt = $this->conn->prepare( 'SHOW COLUMNS FROM ' . $table . ' LIKE ?' );
        $stmt->execute( [ $column ] );
        return (bool)$stmt->fetch();
    }

    private function getTablePrimaryKey( $table )
 {
        if ( !$this->tableExists( $table ) ) {
            return null;
        }

        $stmt = $this->conn->query( 'SHOW KEYS FROM ' . $table . " WHERE Key_name = 'PRIMARY'" );
        $row = $stmt ? $stmt->fetch( PDO::FETCH_ASSOC ) : false;
        return $row['Column_name'] ?? null;
    }

    private function fetchChildRowsByDonId( $table, $idDon )
 {
        if ( !$this->tableExists( $table ) ) {
            return [];
        }

        $sql = 'SELECT * FROM ' . $table . ' WHERE id_don = ?';
        $stmt = $this->conn->prepare( $sql );
        $stmt->execute( [ $idDon ] );
        $rows = $stmt->fetchAll( PDO::FETCH_ASSOC );

        $normalized = [];
        foreach ( $rows as $row ) {
            $item = [];
            foreach ( $row as $column => $value ) {
                if ( $column === 'id_don' ) {
                    continue;
                }
                if ( strpos( $column, 'id_' ) === 0 ) {
                    continue;
                }
                $item[$column] = $value;
            }
            if ( !empty( $item ) ) {
                $normalized[] = $item;
            }
        }

        return $normalized;
    }

    public function getChildDataForEdit( $idDon )
 {
        $data = [
            'list14' => $this->fetchChildRowsByDonId( 'Bang14', $idDon ),
            'list18' => $this->fetchChildRowsByDonId( 'Bang18', $idDon ),
            'list19' => $this->fetchChildRowsByDonId( 'Bang19', $idDon ),
            'list20' => $this->fetchChildRowsByDonId( 'Bang20', $idDon ),
            'list21' => $this->fetchChildRowsByDonId( 'Bang21', $idDon ),
            'list22' => $this->fetchChildRowsByDonId( 'Bang22', $idDon ),
            'list24' => $this->fetchChildRowsByDonId( 'Bang24', $idDon ),
            'list25' => $this->fetchChildRowsByDonId( 'Bang25', $idDon ),
            'list28' => $this->fetchChildRowsByDonId( 'Bang28', $idDon ),
            'list30' => $this->fetchChildRowsByDonId( 'Bang30', $idDon ),
            'list32' => $this->fetchChildRowsByDonId( 'Bang32', $idDon ),
            'list34' => $this->fetchChildRowsByDonId( 'Bang34', $idDon ),
            'list35' => $this->fetchChildRowsByDonId( 'Bang35', $idDon ),
            'list36' => $this->fetchChildRowsByDonId( 'Bang36', $idDon )
        ];

        if ( !empty( $data['list19'] ) ) {
            foreach ( $data['list19'] as &$row19 ) {
                if ( isset( $row19['f19_1_tac_gia'] ) ) {
                    $row19['f19_1_tac_gia_1'] = $row19['f19_1_tac_gia'];
                }
            }
            unset( $row19 );
        }

        if ( !empty( $data['list20'] ) ) {
            foreach ( $data['list20'] as &$row20 ) {
                if ( isset( $row20['f20_3_ngay_nop_tham_chieu'] ) && !isset( $row20['f20_3_ghi_chu'] ) ) {
                    $row20['f20_3_ghi_chu'] = $row20['f20_3_ngay_nop_tham_chieu'];
                }
            }
            unset( $row20 );
        }

        if ( $this->tableExists( 'Bang33' ) ) {
            $rows33 = [];
            $pk33 = $this->getTablePrimaryKey( 'Bang33' ) ?: 'id_33';
            $fk331 = $this->columnExists( 'Bang33_1', 'id_33' )
                ? 'id_33'
                : ( $this->columnExists( 'Bang33_1', $pk33 ) ? $pk33 : null );

            if ( $fk331 === null ) {
                $data['list33'] = [];
                return $data;
            }

            $sql33 = 'SELECT b33.' . $pk33 . ' AS row33_id, b33.f33_1_ma_vu_viec
                      FROM Bang33 b33
                      WHERE b33.id_don = ?
                      ORDER BY b33.' . $pk33 . ' ASC';
            $stmt33 = $this->conn->prepare( $sql33 );
            $stmt33->execute( [ $idDon ] );
            $parents = $stmt33->fetchAll( PDO::FETCH_ASSOC );

            $sql331 = 'SELECT f33_1_1_mo_ta_su_viec, f33_1_2_ngay_phat_sinh, f33_1_3_deadline,
                              f33_1_4_ngay_xu_ly, f33_1_5_ghi_chu
                       FROM Bang33_1
                       WHERE ' . $fk331 . ' = ?';
            $stmt331 = $this->conn->prepare( $sql331 );

            foreach ( $parents as $parent ) {
                $stmt331->execute( [ $parent['row33_id'] ] );
                $children = $stmt331->fetchAll( PDO::FETCH_ASSOC );
                $rows33[] = [
                    'f33_1_ma_vu_viec' => $parent['f33_1_ma_vu_viec'] ?? null,
                    'children' => !empty( $children ) ? $children : [ [] ]
                ];
            }

            $data['list33'] = $rows33;
        } else {
            $data['list33'] = [];
        }

        return $data;
    }

    public function update( $data )
 {
        try {
            $pk = $this->getPrimaryKeyColumn();
            $id = $data['id_don'] ?? $data['id'] ?? null;
            if ( !$id ) {
                return false;
            }

            $this->conn->beginTransaction();

            $sql = 'update Don set
                f1_loai_ho_so = ?, f2_our_ref = ?, f3_your_ref = ?, f4_tong_diem_doc_lap = ?,
                f5_id_khach_hang = ?, f6_ten_khach_hang = ?, f7_uy_quyen = ?, f8_ban_sao = ?,
                f9_reference_data = ?, f10_so_don = ?, f11_ngay_nop_don = ?, f12_so_bang = ?,
                f13_ngay_cap_bang = ?, f15_ten_doi_tuong = ?, f16_phan_loai = ?, f17_noi_nop = ?,
                f23_thong_tin_bo_sung = ?, f26_chap_nhan_ht = ?, f27_cong_bo_don = ?,
                f29_1_chap_nhan_cb = ?, f29_2_deadline_nop_phi = ?, f29_3_gia_han_nop_phi = ?,
                f29_4_deadline_nop_phi = ?, f29_5_ngay_dong_phi = ?, f29_6_ngay_gui_bang = ?,
                f31_ma_duy_tri_gia_han = ?
                where ' . $pk . ' = ?';
            $stmt = $this->conn->prepare( $sql );
            $updated = $stmt->execute( [
                $this->toNullable( $data['f1_loai_ho_so'] ?? null ),
                $this->toNullable( $data['f2_our_ref'] ?? null ),
                $this->toNullable( $data['f3_your_ref'] ?? null ),
                $this->toNullable( $data['f4_tong_diem_doc_lap'] ?? null ),
                $this->toNullable( $data['f5_id_khach_hang'] ?? null ),
                $this->toNullable( $data['f6_ten_khach_hang'] ?? null ),
                $this->toNullable( $data['f7_uy_quyen'] ?? null ),
                $this->toNullable( $data['f8_ban_sao'] ?? null ),
                $this->toNullable( $data['f9_reference_data'] ?? null ),
                $this->toNullable( $data['f10_so_don'] ?? null ),
                $this->toNullable( $data['f11_ngay_nop_don'] ?? null ),
                $this->toNullable( $data['f12_so_bang'] ?? null ),
                $this->toNullable( $data['f13_ngay_cap_bang'] ?? null ),
                $this->toNullable( $data['f15_ten_doi_tuong'] ?? null ),
                $this->toNullable( $data['f16_phan_loai'] ?? null ),
                $this->toNullable( $data['f17_noi_nop'] ?? null ),
                $this->toNullable( $data['f23_thong_tin_bo_sung'] ?? null ),
                $this->toNullable( $data['f26_chap_nhan_ht'] ?? null ),
                $this->toNullable( $data['f27_cong_bo_don'] ?? null ),
                $this->toNullable( $data['f29_1_chap_nhan_cb'] ?? null ),
                $this->toNullable( $data['f29_2_deadline_nop_phi'] ?? null ),
                $this->toNullable( $data['f29_3_gia_han_nop_phi'] ?? null ),
                $this->toNullable( $data['f29_4_deadline_nop_phi'] ?? null ),
                $this->toNullable( $data['f29_5_ngay_dong_phi'] ?? null ),
                $this->toNullable( $data['f29_6_ngay_gui_bang'] ?? null ),
                $this->toNullable( $data['f31_ma_duy_tri_gia_han'] ?? null ),
                $id
            ] );

            if ( !$updated ) {
                if ( $this->conn->inTransaction() ) {
                    $this->conn->rollBack();
                }
                return false;
            }

            $tablesToReset = [
                'Bang14', 'Bang18', 'Bang19', 'Bang20', 'Bang21', 'Bang22',
                'Bang24', 'Bang25', 'Bang28', 'Bang30', 'Bang32', 'Bang34', 'Bang35', 'Bang36'
            ];

            foreach ( $tablesToReset as $table ) {
                if ( !$this->tableExists( $table ) ) {
                    continue;
                }
                $stmtDelete = $this->conn->prepare( 'DELETE FROM ' . $table . ' WHERE id_don = ?' );
                $stmtDelete->execute( [ $id ] );
            }

            if ( $this->tableExists( 'Bang33' ) && $this->tableExists( 'Bang33_1' ) ) {
                $pk33 = $this->getTablePrimaryKey( 'Bang33' ) ?: 'id_33';
                $fk331 = $this->columnExists( 'Bang33_1', 'id_33' )
                    ? 'id_33'
                    : ( $this->columnExists( 'Bang33_1', $pk33 ) ? $pk33 : null );

                if ( $fk331 !== null ) {
                    $sqlDelete331 =
                        'DELETE b331 FROM Bang33_1 b331
                         INNER JOIN Bang33 b33 ON b331.' . $fk331 . ' = b33.' . $pk33 . '
                         WHERE b33.id_don = ?';
                    $stmtDelete331 = $this->conn->prepare( $sqlDelete331 );
                    $stmtDelete331->execute( [ $id ] );
                }

                $stmtDelete33 = $this->conn->prepare( 'DELETE FROM Bang33 WHERE id_don = ?' );
                $stmtDelete33->execute( [ $id ] );
            }

            $this->insertChildRows( 'Bang14', $id, [
                'f14_1_mota' => $data['f14_1_mota'] ?? [],
                'f14_2_ngay_lien_quan' => $data['f14_2_ngay_lien_quan'] ?? [],
                'f14_3_ghi_chu' => $data['f14_3_ghi_chu'] ?? []
            ] );

            $this->insertChildRows( 'Bang18', $id, [
                'f18_1_ten_chu_don' => $data['f18_1_ten_chu_don'] ?? [],
                'f18_2_dia_chi_chu_don' => $data['f18_2_dia_chi_chu_don'] ?? [],
                'f18_3_quoc_gia_chu_don' => $data['f18_3_quoc_gia_chu_don'] ?? [],
                'f18_4_mst_cc' => $data['f18_4_mst_cc'] ?? [],
                'f18_5_id_chu_don' => $data['f18_5_id_chu_don'] ?? []
            ] );

            $this->insertChildRows( 'Bang19', $id, [
                'f19_1_tac_gia' => $data['f19_1_tac_gia_1'] ?? [],
                'f19_2_dia_chi_tac_gia' => $data['f19_2_dia_chi_tac_gia'] ?? [],
                'f19_3_quoc_tich_tac_gia' => $data['f19_3_quoc_tich_tac_gia'] ?? [],
                'f19_4_email_tac_gia' => $data['f19_4_email_tac_gia'] ?? [],
                'f19_5_dien_thoai_tac_gia' => $data['f19_5_dien_thoai_tac_gia'] ?? [],
                'f19_6_can_cuoc_tac_gia' => $data['f19_6_can_cuoc_tac_gia'] ?? []
            ] );

            $bang20Col3 = $this->detectBang20Col3();
            $bang20ValuesCol3 = $bang20Col3 === 'f20_3_ghi_chu'
                ? ( $data['f20_3_ghi_chu'] ?? [] )
                : ( $data['f20_3_ngay_nop_tham_chieu'] ?? ( $data['f20_3_ghi_chu'] ?? [] ) );
            $this->insertChildRows( 'Bang20', $id, [
                'f20_1_so_don_tham_chieu' => $data['f20_1_so_don_tham_chieu'] ?? [],
                'f20_2_ngay_nop_tham_chieu' => $data['f20_2_ngay_nop_tham_chieu'] ?? [],
                $bang20Col3 => $bang20ValuesCol3
            ] );

            $this->insertChildRows( 'Bang21', $id, [
                'f21_1_so_don_uu_tien' => $data['f21_1_so_don_uu_tien'] ?? [],
                'f21_2_ngay_uu_tien' => $data['f21_2_ngay_uu_tien'] ?? [],
                'f21_3_ma_nuoc' => $data['f21_3_ma_nuoc'] ?? []
            ] );

            $this->insertChildRows( 'Bang22', $id, [
                'f22_1_ten' => $data['f22_1_ten'] ?? [],
                'f22_2_email' => $data['f22_2_email'] ?? [],
                'f22_3_dien_thoai' => $data['f22_3_dien_thoai'] ?? [],
                'f22_4_ghi_chu' => $data['f22_4_ghi_chu'] ?? []
            ] );

            $this->insertChildRows( 'Bang24', $id, [
                'f24_1_ten' => $data['f24_1_ten'] ?? [],
                'f24_2_ngay' => $data['f24_2_ngay'] ?? [],
                'f24_3_ghi_chu' => $data['f24_3_ghi_chu'] ?? []
            ] );

            $this->insertChildRows( 'Bang25', $id, [
                'f25_1thongbao_ht' => $data['f25_1thongbao_ht'] ?? [],
                'f25_2_deadline_ht' => $data['f25_2_deadline_ht'] ?? [],
                'f25_3_giahan_ht' => $data['f25_3_giahan_ht'] ?? [],
                'f25_4_deadline_gh' => $data['f25_4_deadline_gh'] ?? [],
                'f25_5_ngay_phuc_dap' => $data['f25_5_ngay_phuc_dap'] ?? []
            ] );

            $this->insertChildRows( 'Bang28', $id, [
                'f28_1_thong_bao_nd' => $data['f28_1_thong_bao_nd'] ?? [],
                'f28_2_deadline_nd' => $data['f28_2_deadline_nd'] ?? [],
                'f28_3_giahan_nd' => $data['f28_3_giahan_nd'] ?? [],
                'f28_4_deadline_gh' => $data['f28_4_deadline_gh'] ?? [],
                'f28_5_ngay_phuc_dap' => $data['f28_5_ngay_phuc_dap'] ?? []
            ] );

            $this->insertChildRows( 'Bang30', $id, [
                'f30_1_mo_ta_su_viec' => $data['f30_1_mo_ta_su_viec'] ?? [],
                'f30_2_ngay_phat_sinh' => $data['f30_2_ngay_phat_sinh'] ?? [],
                'f30_3_deadline' => $data['f30_3_deadline'] ?? [],
                'f30_4_ngay_xu_ly' => $data['f30_4_ngay_xu_ly'] ?? [],
                'f30_5_ghi_chu' => $data['f30_5_ghi_chu'] ?? []
            ] );

            $this->insertChildRows( 'Bang32', $id, [
                'f32_1_vn_deadline_duy_tri_nam' => $data['f32_1_vn_deadline_duy_tri_nam'] ?? [],
                'f32_2_vn_ngay_nop_duy_tri_nam' => $data['f32_2_vn_ngay_nop_duy_tri_nam'] ?? [],
                'f32_3_vn_trangthai' => $data['f32_3_vn_trangthai'] ?? []
            ] );

            $this->insertBang33AndBang33_1( $id, $data );

            $this->insertChildRows( 'Bang34', $id, [
                'f34_1_ten_tai_lieu' => $data['f34_1_ten_tai_lieu'] ?? [],
                'f34_2_so_tai_lieu' => $data['f34_2_so_tai_lieu'] ?? [],
                'f34_3_ngay_phat_hanh' => $data['f34_3_ngay_phat_hanh'] ?? [],
                'f34_4_ghi_chu' => $data['f34_4_ghi_chu'] ?? []
            ] );

            $this->insertChildRows( 'Bang35', $id, [
                'f35_1_ten_tai_lieu' => $data['f35_1_ten_tai_lieu'] ?? [],
                'f35_2_so_tai_lieu' => $data['f35_2_so_tai_lieu'] ?? [],
                'f35_3_nguoi_gui' => $data['f35_3_nguoi_gui'] ?? [],
                'f35_4_ngay_nhan' => $data['f35_4_ngay_nhan'] ?? [],
                'f35_5_ghi_chu' => $data['f35_5_ghi_chu'] ?? []
            ] );

            $this->insertChildRows( 'Bang36', $id, [
                'f36_1_ten_tai_lieu' => $data['f36_1_ten_tai_lieu'] ?? [],
                'f36_2_so_tai_lieu' => $data['f36_2_so_tai_lieu'] ?? [],
                'f36_3_nguoi_nhan' => $data['f36_3_nguoi_nhan'] ?? [],
                'f36_4_ngay_gui' => $data['f36_4_ngay_gui'] ?? [],
                'f36_5_ghi_chu' => $data['f36_5_ghi_chu'] ?? []
            ] );

            $this->conn->commit();
            return true;
        } catch( PDOException $e ) {
            if ( $this->conn->inTransaction() ) {
                $this->conn->rollBack();
            }
            echo 'Lỗi:'.$e->getMessage();
            return false;
        }
    }

    public function delete( $id ) {
        try {
            //Xóa trong bảng hàng hóa
            $sql = 'delete from HangHoa where Maloai=?';
            $stmt = $this->conn->prepare( $sql );
            $stmt->execute( [ $id ] );

            //Xóa trong loại hàng
            $sql = 'delete from LoaiHang Where Maloai=?';
            $stmt = $this->conn->prepare( $sql );
            return $stmt->execute( [ $id ] );
        } catch( PDOException $e )
 {
            echo 'Lỗi:'.$e->getMessage();
            return null;
        }

    }
}
?>