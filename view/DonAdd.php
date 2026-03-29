<script src='../js/DonAdd.js'></script>
<!-- Cụm 1 -->
<!-- Cụm 1: Thông tin chính yếu -->
<?php
$don = $don ?? [];
$donChildren = $donChildren ?? [];
$isEdit = isset( $don ) && is_array( $don );
$recordId = $don['id_don'] ?? $don['id'] ?? null;
$formAction = $isEdit && $recordId !== null
    ? '?action=edit&id=' . urlencode( (string)$recordId )
    : '?action=add';

// Helper function để lấy giá trị field with htmlspecialchars
function getFieldValue( $key, $data = null ) {
    if ( !$data || !isset( $data[ $key ] ) ) {
        return '';
    }
    return htmlspecialchars( (string)$data[ $key ], ENT_QUOTES, 'UTF-8' );
}

// Debug: check nếu đang ở chế độ edit
if ( $isEdit && $recordId ) {
    error_log( 'EDIT MODE: ID=' . $recordId . ', Data keys=' . implode( ',', array_keys( $don ) ) );
}
?>
<form method="post" action="<?= $formAction ?>" class="mb-4">
    <?php if ( $isEdit && $recordId !== null ): ?>
    <input type="hidden" name="id_don" value="<?= htmlspecialchars( (string)$recordId ) ?>">
    <?php endif; ?>
    <!-- cụm 1 -->
    <div class="card card-custom p-4 mb-4">
        <h5 class="text-success fw-bold mb-3">Cụm 1: Thông tin chính yếu</h5>
        <div class="row">
            <!-- Loại hồ sơ -->
            <div class="col-md-4">
                <label for="f1_loai_ho_so" class="fw-bold">Loại hồ sơ</label>
                <input class="form-control mb-2" list="danh_sach_loai_ho_so" id="loai_ho_so" name="f1_loai_ho_so"
                    placeholder="Chọn hoặc nhập..." value="<?= getFieldValue( 'f1_loai_ho_so', $don ) ?>">
                <datalist id="danh_sach_loai_ho_so">
                    <option value="Sáng chế">
                    <option value="Nhãn hiệu">
                    <option value="Kiểu dáng">
                    <option value="Giống cây trồng">
                    <option value="Chỉ dẫn địa lý">
                    <option value="Bản quyền tác giả">
                    <option value="Mạch tích hợp">
                </datalist>
            </div>
            <div class="col-md-4">
                <label for="our_ref">Our Ref</label>
                <input type="text" class="form-control" id="our_ref" name="f2_our_ref" value="<?= getFieldValue( 'f2_our_ref', $don ) ?>">
            </div>
            <div class="col-md-4">
                <label for="your_ref">Your Ref</label>
                <input type="text" class="form-control" id="your_ref" name="f3_your_ref" value="<?= getFieldValue( 'f3_your_ref', $don ) ?>">
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-6">
                <label for="tong_diem_doc_lap">Tổng số điểm độc lập/nhóm hàng hóa dịch vụ/phương án <br>thiết kế</label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" id="tong_diem_doc_lap" name="f4_tong_diem_doc_lap" value="<?= getFieldValue( 'f4_tong_diem_doc_lap', $don ) ?>">
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-3">
                <label for="id_khach_hang" class="text-danger">ID khách hàng</label>
                <input type="text" class="form-control" id="id_khach_hang" name="f5_id_khach_hang" value="<?= getFieldValue( 'f5_id_khach_hang', $don ) ?>">
            </div>
            <div class="col-md-3">
                <label for="ten_khach_hang">Tên khách hàng</label>
                <input type="text" class="form-control" id="ten_khach_hang" name="f6_ten_khach_hang" value="<?= getFieldValue( 'f6_ten_khach_hang', $don ) ?>">
            </div>
            <div class="col-md-6">
                <label for="uy_quyen">Ủy quyền</label>
                <div class="d-flex gap-2">
                    <select class="form-select" id="uy_quyen" name="f7_uy_quyen">
                        <option value="">Chọn...</option>
                        <option value="General" <?= getFieldValue( 'f7_uy_quyen', $don ) == 'General' ? 'selected' : '' ?>>General</option>
                        <option value="Specific" <?= getFieldValue( 'f7_uy_quyen', $don ) == 'Specific' ? 'selected' : '' ?>>Specific</option>
                    </select>
                    <select class="form-select" id="ban_sao" name="f8_ban_sao">
                        <option value="">Chọn...</option>
                        <option value="Original" <?= getFieldValue( 'f8_ban_sao', $don ) == 'Original' ? 'selected' : '' ?>>Original</option>
                        <option value="Copy" <?= getFieldValue( 'f8_ban_sao', $don ) == 'Copy' ? 'selected' : '' ?>>Copy</option>
                    </select>
                    <input type="text" class="form-control" id="reference_data" name="f9_reference_data"
                        placeholder="Reference data" value="<?= getFieldValue( 'f9_reference_data', $don ) ?>">
                </div>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-3">
                <label for="so_don">Số đơn</label>
                <input type="text" class="form-control" id="so_don" name="f10_so_don" value="<?= getFieldValue( 'f10_so_don', $don ) ?>">
            </div>
            <div class="col-md-3">
                <label for="ngay_nop_don">Ngày nộp đơn</label>
                <input type="date" class="form-control" id="ngay_nop_don" name="f11_ngay_nop_don" value="<?= getFieldValue( 'f11_ngay_nop_don', $don ) ?>">
            </div>
            <div class="col-md-3">
                <label for="so_bang">Số bằng</label>
                <input type="text" class="form-control" id="so_bang" name="f12_so_bang" value="<?= getFieldValue( 'f12_so_bang', $don ) ?>">
            </div>
            <div class="col-md-3">
                <label for="ngay_cap_bang">Ngày cấp bằng</label>
                <input type="date" class="form-control" id="ngay_cap_bang" name="f13_ngay_cap_bang" value="<?= getFieldValue( 'f13_ngay_cap_bang', $don ) ?>">
            </div>
        </div>

        <fieldset class="border p-2 rounded mb-2">
            <legend class="float-none w-auto px-2 fs-6 text-danger">Trạng thái bổ xung</legend>
            <div id="list14" class="list14">           
                <div class="row mb-2">
                        <div class='col-md-1'>
                            <label>STT</label>
                            <input type='text' class='form-control' name='stt[]' readonly value='1'>
                        </div>
                        <div class="col-md-3">
                            <label for="f14-1-mota">Mô tả</label>
                            <input type="text" class="form-control"  name="f14_1_mota[]">
                        </div>
                        <div class="col-md-3">
                            <label for="f14-2-ngay-lien-quan">Ngày liên quan</label>
                            <input type="date" class="form-control"  name="f14_2_ngay_lien_quan[]">
                        </div>
                        <div class="col-md-4">
                            <label for="f14-3-ghi-chu">Ghi chú</label>
                            <input type="text" class="form-control"  name="f14_3_ghi_chu[]">
                        </div>
                        <div class='col-md-1 d-flex align-items-end'>
                            <button type='button' class='btn btn-danger btn-sm' onclick='removeRow(this, "list14", "row")'>Xóa</button>
                        </div>
                    </div>                
            </div>
            <button type="button" class="btn btn-primary btn-sm" onclick="addRow14();"><i class='bi bi-plus-circle'></i> Add</button>
        </fieldset>

    </div>
    <!-- Kết thúc cụm 1 -->
    <!-- Cụm 2: Thông tin thư/mục đơn -->
    <div class="card card-custom p-4 mb-4">
        <h5 class="text-success fw-bold mb-3">Cụm 2: Thông tin thư/mục đơn</h5>
        <div class="row mb-2">
            <div class="col-md-4">
                <label for="f15-ten_doi_tuong">Tên đối tượng</label>
                <input type="text" class="form-control" id="ten_doi_tuong" name="f15_ten_doi_tuong" value="<?= getFieldValue( 'f15_ten_doi_tuong', $don ) ?>">
            </div>
            <div class="col-md-4">
                <label for="f16-phan_loai">Phân loại</label>
                <input type="text" class="form-control" id="f16-phan_loai" name="f16_phan_loai" value="<?= getFieldValue( 'f16_phan_loai', $don ) ?>">
            </div>
            <div class="col-md-4">
                <label for="f17_noi_nop">Nơi nộp</label>
                <input type="text" class="form-control" id="f17_noi_nop" name="f17_noi_nop" value="<?= getFieldValue( 'f17_noi_nop', $don ) ?>">
            </div>
        </div>
        <!-- Thông tin chủ đơn -->
        <fieldset class="border p-2 rounded mb-2">
            <legend class="float-none w-auto px-2 fs-6">Thông tin chủ đơn</legend>
            <div id="list18" class="list18 border rounded" >
                <div class="row18" class="border row18 rounded mt-2 p-2" >
                    <div class="row mb-2">
                        <div class='col-md-1'>
                            <label>STT</label>
                            <input type='text' class='form-control' name='stt[]' readonly value='1'>
                        </div>
                        <div class="col-md-5">
                            <label for="ten_chu_don">Chủ đơn</label>
                            <input type="text" class="form-control" id="ten_chu_don" name="f18_1_ten_chu_don[]">
                        </div>
                        <div class="col-md-6">
                            <label for="dia_chi_chu_don">Địa chỉ</label>
                            <input type="text" class="form-control" id="dia_chi_chu_don" name="f18_2_dia_chi_chu_don[]">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2">
                            <label for="quoc_gia_chu_don">Quốc Gia</label>
                            <input type="text" class="form-control" id="quoc_gia_chu_don" name="f18_3_quoc_gia_chu_don">
                        </div>
                        <div class="col-md-4">
                            <label for="mst_cc">MST/CC</label>
                            <input type="text" class="form-control" id="mst_cc" name="f18_4_mst_cc[]">
                        </div>
                        <div class="col-md-5">
                            <label for="id_chu_don" class="text-danger">ID chủ đơn</label>
                            <input type="text" class="form-control" id="id_chu_don" name="f18_5_id_chu_don">
                        </div>
                        <div class='col-md-1 d-flex align-items-end'>
                            <button type='button' class='btn btn-danger btn-sm' onclick='removeRow(this, "list18", "row18")'>Xóa</button>
                        </div>
                    </div>
                </div> 
                <!-- row18 -->
            </div>
            <div class="mt-2">
                <button  type="button" class="btn btn-primary btn-sm" onclick="addRow18('list18', 'row18');"><i class="bi bi-plus-circle"></i> Add</button>
            </div>
        </fieldset>
        <!-- Thông tin tác giả -->
        <legend class="float-none w-auto px-2 fs-6">Thông tin tác giả</legend>
            <div id="list19">
                <div class="row19">
                    <div class="row mb-2">                
                        <div class='col-md-1'>
                            <label>STT</label>
                            <input type='text' class='form-control' name='stt[]' readonly value='1'>
                        </div>
                        <div class="col-md-4">
                            <label for="tac_gia_1">Tác giả 1</label>
                            <input type="text" class="form-control" id="tac_gia_1" name="f19_1_tac_gia_1[]">
                        </div>
                        <div class="col-md-5">
                            <label for="dia_chi_tac_gia">Địa chỉ</label>
                            <input type="text" class="form-control" id="dia_chi_tac_gia" name="f19_2_dia_chi_tac_gia[]">
                        </div>
                        <div class="col-md-2">
                            <label for="quoc_tich_tac_gia">Quốc tịch</label>
                            <input type="text" class="form-control" id="quoc_tich_tac_gia" name="f19_3_quoc_tich_tac_gia[]">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label for="email_tac_gia">Email</label>
                            <input type="email" class="form-control" id="email_tac_gia" name="f19_4_email_tac_gia[]">
                        </div>
                        <div class="col-md-4">
                            <label for="dien_thoai_tac_gia">Điện thoại</label>
                            <input type="text" class="form-control" id="dien_thoai_tac_gia" name="f19_5_dien_thoai_tac_gia[]">
                        </div>
                        <div class="col-md-3">
                            <label for="can_cuoc_tac_gia">Căn cước</label>
                            <input type="text" class="form-control" id="can_cuoc_tac_gia" name="f19_6_can_cuoc_tac_gia[]">
                        </div>
                        <div class='col-md-1 d-flex align-items-end'>
                            <button type='button' class='btn btn-danger btn-sm' onclick='removeRow(this,"list19","row19")'>Xóa</button>
                        </div>
                    </div>
                </div>
                <!-- end row19 -->
            </div>
            <!-- end list19 -->
            <div class="mt-2">
                <button  type="button" class="btn btn-primary btn-sm" onclick='addRow19()';><i class="bi bi-plus-circle"></i> Add</button>
            </div>
        </fieldset>
        <!-- Nguồn gốc đơn & Thông tin đơn ưu tiên -->
            <fieldset class="border p-2 rounded h-100">
            <legend class="float-none w-auto px-2 fs-6">Nguồn gốc đơn hihi</legend>
            <div id="list20">
                <div class="row mb-2">
                    <div class='col-md-1'>
                        <label>STT</label>
                        <input type='text' class='form-control' name='stt[]' readonly value='1'>
                    </div>
                    <div class="col-md-3">
                        <label for="so_don_tham_chieu_1">Số đơn tham chiếu 1</label>
                        <input type="text" class="form-control" id="so_don_tham_chieu_1"
                            name="f20_1_so_don_tham_chieu[]">
                    </div>
                    <div class="col-md-3">
                        <label for="ngay_nop_tham_chieu_1">Ngày nộp</label>
                        <input type="date" class="form-control" id="ngay_nop_tham_chieu_1"
                            name="f20_2_ngay_nop_tham_chieu[]">
                    </div>
                    <div class="col-md-4">
                        <label for="ngay_nop_tham_chieu_1">Ghi chú</label>
                        <input type="text" class="form-control" id="ghi_chu_1"
                            name="f20_3_ghi_chu[]">
                    </div>
                    <div class='col-md-1 d-flex align-items-end'>
                        <button type='button' class='btn btn-danger btn-sm' onclick='removeRow(this,"list20","row")'>Xóa</button>
                    </div>
                </div>
                <!-- row -->
            </div>
            <button  type="button" class="btn btn-primary btn-sm" onclick="addRow20();"><i class="bi bi-plus-circle"></i> Add</button>
        </fieldset>
        <fieldset class="border p-2 rounded h-100">
            <legend class="float-none w-auto px-2 fs-6">Thông tin đơn ưu tiên</legend>
            <div id="list21">
                <div class="row mb-2">
                    <div class='col-md-1'>
                        <label>STT</label>
                        <input type='text' class='form-control' name='stt[]' readonly value='1'>
                    </div>
                    <div class="col-md-3">
                        <label for="so_don_uu_tien_1">Số đơn ưu tiên 1</label>
                        <input type="text" class="form-control" id="so_don_uu_tien_1" name="f21_1_so_don_uu_tien[]">
                    </div>
                    <div class="col-md-3">
                        <label for="ngay_uu_tien">Ngày ưu tiên</label>
                        <input type="date" class="form-control" id="ngay_uu_tien" name="f21_2_ngay_uu_tien[]">
                    </div>
                    <div class="col-md-4">
                        <label for="ma_nuoc">Mã nước</label>
                        <input type="text" class="form-control" id="ma_nuoc" name="f21_3_ma_nuoc[]">
                    </div>
                    <div class='col-md-1 d-flex align-items-end'>
                        <button type='button' class='btn btn-danger btn-sm' onclick='removeRow(this,"list21","row")'>Xóa</button>
                    </div>
                </div>
            </div>
            <button  type="button" class="btn btn-primary btn-sm" onclick="addRow21();"><i class="bi bi-plus-circle"></i> Add</button>
        </fieldset>        
        <!-- Thông tin liên hệ khách hàng -->
        <fieldset class="border p-2 rounded mb-2">
            <legend class="float-none w-auto px-2 fs-6 text-danger">Thông tin liên hệ khách hàng</legend>
            <div id="list22">
                <div class="row mb-2">
                    <div class='col-md-1'>
                        <label>STT</label>
                        <input type='text' class='form-control' name='stt[]' readonly value='1'>
                    </div>
                    <div class="col-md-2">
                        <label for="contact1_ten">Contact</label>
                        <input type="text" class="form-control" name="f22_1_ten[]">
                    </div>
                    <div class="col-md-2">
                        <label for="contact1_email">Email</label>
                        <input type="email" class="form-control" name="f22_2_email[]">
                    </div>
                    <div class="col-md-2">
                        <label for="contact1_dien_thoai">Điện thoại</label>
                        <input type="text" class="form-control"  name="f22_3_dien_thoai[]">
                    </div>
                    <div class="col-md-4">
                        <label for="contact1_ghi_chu">Ghi chú</label>
                        <input type="text" class="form-control"  name="f22_4_ghi_chu[]">
                    </div>
                    <div class='col-md-1 d-flex align-items-end'>
                        <button type='button' class='btn btn-danger btn-sm' onclick='removeRow22(this,"list22","row")'>Xóa</button>
                    </div>
                </div>
            </div>
            <button  type="button" class="btn btn-primary btn-sm" onclick="addRow22();"><i class="bi bi-plus-circle"></i> Add</button>
        </fieldset>

        <!-- Cụm 2: Thông tin thư/mục đơn (tiếp) -->

        <div class="mb-3">
            <label for="thong_tin_bo_sung" class="form-label">
                Thông tin bổ sung (Tóm tắt sáng chế)
            </label>
            <textarea class="form-control" id="thong_tin_bo_sung" name="f23_thong_tin_bo_sung" rows="5"
                placeholder="Nhập text"><?= getFieldValue( 'f23_thong_tin_bo_sung', $don ) ?></textarea>
        </div>
        <fieldset class="border p-2 rounded">
            <legend class="float-none w-auto px-2 fs-6">Tài liệu bổ sung</legend>
            <div id="list24">
                <div class="row mb-2">
                    <div class='col-md-1'>
                        <label>STT</label>
                        <input type='text' class='form-control' name='stt[]' readonly value='1'>
                    </div>
                    <div class="col-md-4">
                        <label for="ten_tai_lieu">Tên tài liệu</label>
                        <input type="text" class="form-control"  name="f24_1_ten[]"
                            placeholder="Nhập text (tên TL)">
                    </div>
                    <div class="col-md-3">
                        <label for="ngay_lien_quan">Ngày liên quan</label>
                        <input type="date" class="form-control"  name="f24_2_ngay[]">
                    </div>
                    <div class="col-md-3">
                        <label for="ghi_chu_tai_lieu">Ghi chú</label>
                        <input type="text" class="form-control" name="f24_3_ghi_chu[]"
                            placeholder="Text">
                    </div>
                    <div class='col-md-1 d-flex align-items-end'>
                        <button type='button' class='btn btn-danger btn-sm' onclick='removeRow24(this,"list24","row")'>Xóa</button>
                    </div>
                </div>
            </div>            
            <button  type="button" class="btn btn-primary btn-sm" onclick="addRow24();"><i class="bi bi-plus-circle"></i> Add</button>
        </fieldset>
    </div>
    <!-- Kết thúc cụm 2 -->
    <!-- cụm 3 -->
    <!-- Cụm 3: Tiến trình xử lý đơn -->
    <div class="card card-custom p-4 mb-4">
        <h5 class="text-success fw-bold mb-3">Cụm 3: Tiến trình xử lý đơn</h5>
        <!-- Deadline loại 1 -->
        <fieldset class="border p-3 rounded">
            <legend class="float-none w-auto px-2 fs-6">Deadline loại 1</legend>
            <div id="list25">    
                <div class="row">
                    <div class='col-md-1'>
                        <label>STT</label>
                        <input type='text' class='form-control' name='stt[]' readonly value='1'>
                    </div>
                    <div class="col-md-2">
                        <label>Thông báo HT1</label>
                        <input type="date" class="form-control" name="f25_1thongbao_ht[]" />
                    </div>
                    <div class="col-md-2">
                        <label>Deadline HT1</label>
                        <input type="date" class="form-control" name="f25_2_deadline_ht[]" />
                    </div>                         
                
                    <div class="col-md-2">
                        <label for="giahan_ht1">Gia hạn HT1</label>
                        <input type="date" class="form-control" name="f25_3_giahan_ht[]"  />
                    </div>
                    <div class="col-md-2">
                        <label>Deadline GH1</label>
                        <input type="date" class="form-control" name="f25_4_deadline_gh[]"  />
                    </div>
                    <div class="col-md-2">
                        <label>Ngày phúc đáp</label>
                        <input type="date" class="form-control" name="f25_5_ngay_phuc_dap[]" />
                    </div>
                    <div class='col-md-1 d-flex align-items-end'>
                            <button type='button' class='btn btn-danger btn-sm' onclick='removeRow(this,"list25","row")'>Xóa</button>
                    </div>
                </div>
            </div>
            <button  type="button" class="btn btn-primary btn-sm" onclick="addRow25();"><i class="bi bi-plus-circle" ></i> Add</button>
            <div class="row">
                <div class="mb-2 col-md-6">
                    <label>Chấp nhận HT</label>
                    <input type="date" class="form-control" name="f26_chap_nhan_ht" value="<?= getFieldValue( 'f26_chap_nhan_ht', $don ) ?>" />
                </div>
                <div class="mb-2 col-md-6">
                    <label>Công bố đơn</label>
                    <input type="date" class="form-control" name="f27_cong_bo_don" value="<?= getFieldValue( 'f27_cong_bo_don', $don ) ?>" />
                </div>
            </div>
        </fieldset>

        <fieldset class="border p-3 rounded">
            <legend class="float-none w-auto px-2 fs-6">Deadline loại 2</legend>
            <div id="list28">
                <div class="row28">
                    <div class="row mb-2">
                        <div class='col-md-1'>
                            <label>STT</label>
                            <input type='text' class='form-control' name='stt[]' readonly value='1'>
                        </div>
                        <div class="col-md-6">
                            <label>Thông báo ND1</label>
                            <input type="date" class="form-control" name="f28_1_thong_bao_nd[]" />
                        </div>
                        <div class="col-md-5">
                            <label>Deadline ND1</label>
                            <input type="date" class="form-control" name="f28_2_deadline_nd[]" />
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label>Gia hạn ND1</label>
                            <input type="date" class="form-control" name="f28_3_giahan_nd[]" />
                        </div>
                        <div class="col-md-4">
                            <label>Deadline GH1</label>
                            <input type="date" class="form-control" name="f28_4_deadline_gh[]" />
                        </div>
                        <div class="col-md-3">
                            <label>Ngày phúc đáp</label>
                            <input type="date" class="form-control" name="f28_5_ngay_phuc_dap[]" />
                        </div>
                        <div class='col-md-1 d-flex align-items-end'>
                            <button type='button' class='btn btn-danger btn-sm' onclick='removeRow(this,"list28","row28")'>Xóa</button>
                        </div>
                    </div>
                </div>
            </div>            
            <button type="button" class="btn btn-primary btn-sm" onclick='addRow28();'><i class="bi bi-plus-circle"></i> Add</button>
        </fieldset>
        <!-- Deadline loại 3 -->            
        <fieldset class="border p-3 rounded">
            <legend class="float-none w-auto px-2 fs-6">Deadline loại 3</legend>
            <div class="row mb-2">
                <div class="col-md-6">
                    <label>Chấp nhận CB</label>
                    <input type="date" class="form-control" name="f29_1_chap_nhan_cb" value="<?= getFieldValue( 'f29_1_chap_nhan_cb', $don ) ?>" />
                </div>
                <div class="col-md-6">
                    <label>Deadline nộp phí</label>
                    <input type="date" class="form-control" placeholder="Date + 03 tháng"
                        name="f29_2_deadline_nop_phi" value="<?= getFieldValue( 'f29_2_deadline_nop_phi', $don ) ?>" />
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <label>Gia hạn nộp phí</label>
                    <input type="date" class="form-control" placeholder="Date + 06 tháng"
                        name="f29_3_gia_han_nop_phi" value="<?= getFieldValue( 'f29_3_gia_han_nop_phi', $don ) ?>" />
                </div>
                <div class="col-md-6">
                    <label>Deadline nộp phí</label>
                    <input type="date" class="form-control" placeholder="Date + 06 tháng"
                        name="f29_4_deadline_nop_phi" value="<?= getFieldValue( 'f29_4_deadline_nop_phi', $don ) ?>" />
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <label>Ngày đóng phí</label>
                    <input type="date" class="form-control" name="f29_5_ngay_dong_phi" value="<?= getFieldValue( 'f29_5_ngay_dong_phi', $don ) ?>" />
                </div>
                <div class="col-md-6">
                    <label>Ngày gửi bằng</label>
                    <input type="date" class="form-control" name="f29_6_ngay_gui_bang" value="<?= getFieldValue( 'f29_6_ngay_gui_bang', $don ) ?>" />
                </div>
            </div>

        </fieldset>    
        <!-- Deadline loại 4 -->
        <fieldset class="border p-3 rounded">
            <legend class="float-none w-auto px-2 fs-6">Deadline loại 4</legend>
                <div id="list30">
                    <div class="row30">    
                        <div class="row mb-2">
                            <div class='col-md-1'>
                                <label>STT</label>
                                <input type='text' class='form-control' name='stt[]' readonly value='1'>
                            </div>
                            <div class="col-md-3">
                                <label>Mô tả sự việc</label>
                                <input type="text" class="form-control" name="f30_1_mo_ta_su_viec[]" />
                            </div>
                            <div class="col-md-3">
                                <label>Ngày phát sinh</label>
                                <input type="date" class="form-control" name="f30_2_ngay_phat_sinh[]" />
                            </div>
                            <div class="col-md-3">
                                <label>Deadline</label>
                                <input type="date" class="form-control" name="f30_3_deadline[]" />
                            </div>
                            <div class="col-md-2">
                                <label>Ngày xử lý</label>
                                <input type="date" class="form-control" name="f30_4_ngay_xu_ly[]" />
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-11">
                                <label>Ghi chú</label>
                                <input type="text" class="form-control" name="f30_5_ghi_chu[]" />
                            </div>
                            <div class='col-md-1 d-flex align-items-end'>
                                <button type='button' class='btn btn-danger btn-sm' onclick='removeRow(this,"list30","row30")'>Xóa</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-sm" onclick="addRow30();"><i class="bi bi-plus-circle"></i> Add</button>
        </fieldset>           
    </div>
    <!-- end of cụm 3 -->
    <!-- Cụm 4: Duy trì gia hạn hiệu lực -->
    <div class="card card-custom p-4 mb-4">
        <h5 class="text-success fw-bold mb-3">Cụm 4: Duy trì gia hạn hiệu lực</h5>
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="ma_duy_tri_gia_han">Mã duy trì gia hạn</label>
                <input type="text" class="form-control" name="f31_ma_duy_tri_gia_han" value="<?= getFieldValue( 'f31_ma_duy_tri_gia_han', $don ) ?>">
            </div>
        </div>
        <fieldset class="border p-3 rounded">
            <div id="list32">
                <div class="row mb-2">
                    <div class='col-md-1'>
                        <label>STT</label>
                        <input type='text' class='form-control' name='stt[]' readonly value='1'>
                    </div>
                    <div class="col-md-3">
                        <label>Deadline duy trì năm 1</label>
                        <input type="date" class="form-control" name="f32_1_vn_deadline_duy_tri_nam[]">
                    </div>
                    <div class="col-md-3">
                        <label>Ngày nộp duy trì</label>
                        <input type="date" class="form-control" name="f32_2_vn_ngay_nop_duy_tri_nam[]">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Trạng thái</label>
                        <input type="text" class="form-control" name="f32_3_vn_trangthai[]" readonly>
                    </div>
                    <div class='col-md-1 d-flex align-items-end'>
                        <button type='button' class='btn btn-danger btn-sm' onclick='removeRow(this,"list32","row")'>Xóa</button>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <button  type="button" class="btn btn-primary btn-sm" onclick="addRow32();"><i class="bi bi-plus-circle"></i> Add</button>
            </div>
        </fieldset>
    </div>
    <!-- end cụm 4 -->
    <!-- Cụm 5: Thủ tục liên quan sau cấp bằng -->
    <div class="card card-custom p-4 mb-4">
        <div class="mb-2"
            style="background: #009846; color: #fff; padding: 8px 16px; border-radius: 4px 4px 0 0; font-weight: bold;">
            Cụm 5: Thủ tục liên quan sau cấp bằng
        </div>
        <!-- <div class="p-3" style="border: 1px solid #222;"> -->
            <div id="list33">
                
                <div class="row33" data-row33-index="1">               
                    <div class="row mb-2">
                        <div class='col-md-1'>
                            <label>STT</label>
                            <input type='text' class='form-control' name='stt[]' readonly value='1'>
                        </div>
                        <div class="col-md-10">
                            <label class="form-label">Mã vụ việc</label>
                            <input type="text" class="form-control" placeholder="Nhập text" name="f33_1_ma_vu_viec[]">
                        </div>
                        <div class='col-md-1 d-flex align-items-end'>
                            <button type='button' class='btn btn-danger btn-sm' onclick='removeRow33(this)'>Xóa</button>
                        </div>
                    </div>
                    <div class="p-3" style="border: 1px solid #222;">
                        <div class="list33_1">
                            <div class="row33_1">
                                <input type="hidden" name="f33_1_parent_index[]" value="1">
                                <div class="row mb-2 align-items-end">
                                    <div class='col-md-1'>
                                        <label>STT</label>
                                        <input type='text' class='form-control' name='stt33_1[]' readonly value='1'>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label">Mô tả sự việc</label>
                                        <input type="text" class="form-control" placeholder="Text" name="f33_1_1_mo_ta_su_viec[]">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Ngày phát sinh</label>
                                        <input type="date" class="form-control" name="f33_1_2_ngay_phat_sinh[]">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Deadline</label>
                                        <input type="date" class="form-control" name="f33_1_3_deadline[]">
                                    </div>
                                </div>
                                <div class="row mb-2 align-items-end">
                                    
                                    <div class="col-md-3">
                                        <label class="form-label">Ngày xử lý</label>
                                        <input type="date" class="form-control" name="f33_1_4_ngay_xu_ly[]">
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label">Ghi chú</label>
                                        <input type="text" class="form-control" placeholder="Text" name="f33_1_5_ghi_chu[]">
                                    </div>
                                    <div class='col-md-1 d-flex align-items-end'>
                                        <button type='button' class='btn btn-danger btn-sm' onclick='removeRow33_1(this)'>Xóa</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" class="btn btn-primary btn-sm  dropdown-toggle" data-bs-toggle="dropdown" onclick="addRow33_1(this);">
                                Add
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- <div class="text-end text-danger fw-bold mt-2">Deadline loại 6</div> -->
            <div class="mt-2">
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" onclick="addRow33();" data-bs-toggle="dropdown">
                    Add
                </button>
            </div>
        <!-- </div> -->
        
    </div>
    <!-- end cụm 5 -->
    <!-- cụm 6  -->

    <div class="card card-custom p-4 mb-4">
        <div class="mb-2"
            style="background: #009846; color: #fff; padding: 8px 16px; border-radius: 4px 4px 0 0; font-weight: bold;">
            Cụm 6: Tài liệu thanh toán
        </div>
        <div class="p-3" style="border: 1px solid #222;">
            <div id="list34">
                <div class="row34">
                    <div class="row mb-2 align-items-end">
                        <div class='col-md-1'>
                            <label>STT</label>
                            <input type='text' class='form-control' name='stt[]' readonly value='1'>
                        </div>
                        <div class="col-md-9">
                            <label class="form-label">Tên tài liệu</label>
                            <input type="text" class="form-control" placeholder="Text" name="f34_1_ten_tai_lieu[]">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Số tài liệu</label>
                            <input type="text" class="form-control" placeholder="Text" name="f34_2_so_tai_lieu[]">
                        </div>
                    </div>
                    <div class="row mb-2 align-items-end">
                        <div class="col-md-2">
                            <label class="form-label">Ngày phát hành</label>
                            <input type="date" class="form-control" name="f34_3_ngay_phat_hanh[]">
                        </div>
                        <div class="col-md-9">
                            <label class="form-label">Ghi chú</label>
                            <input type="text" class="form-control" placeholder="Text" name="f34_4_ghi_chu[]">
                        </div>
                        <div class='col-md-1 d-flex align-items-end'>
                            <button type='button' class='btn btn-danger btn-sm' onclick='removeRow(this,"list34","row34")'>Xóa</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" onclick="addRow34();" data-bs-toggle="dropdown">
                    Add
                </button>
            </div>
        </div>
    </div>
    <!-- end cụm 6 -->
    <!-- cụm 7 -->

    <div class="card card-custom p-4 mb-4">
        <div class="mb-2"
            style="background: #009846; color: #fff; padding: 8px 16px; border-radius: 4px 4px 0 0; font-weight: bold;">
            Cụm 7: Lịch sử giao dịch
        </div>
        <div>
            Tài liệu đến
        </div>
        <div class="p-3" style="border: 1px solid #222;">
            <div id="list35">
                <div class="row35">
                    <div class="row mb-2 align-items-end">
                        <div class='col-md-1'>
                            <label>STT</label>
                            <input type='text' class='form-control' name='stt[]' readonly value='1'>
                        </div>                    
                        <div class="col-md-8">
                            <label class="form-label">Tên tài liệu</label>
                            <input type="text" class="form-control" placeholder="Text" name="f35_1_ten_tai_lieu[]">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Số tài liệu</label>
                            <input type="text" class="form-control" placeholder="Text" name="f35_2_so_tai_lieu[]">
                        </div>
                    </div>
                    <div class="row mb-2 align-items-end">
                        <div class="col-md-5">
                            <label class="form-label">Người gửi</label>
                            <input type="text" class="form-control" placeholder="Text" name="f35_3_nguoi_gui[]">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Ngày nhận</label>
                            <input type="date" class="form-control" name="f35_4_ngay_nhan[]">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Ghi chú</label>
                            <input type="text" class="form-control" name="f35_5_ghi_chu[]">
                        </div>
                        <div class='col-md-1 d-flex align-items-end'>
                            <button type='button' class='btn btn-danger btn-sm' onclick='removeRow(this,"list35","row35")'>Xóa</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" onclick="addRow35();" data-bs-toggle="dropdown">
                Add
            </button>
        </div>
        <div>
            Tài liệu đi
        </div>
        <div class="p-3" style="border: 1px solid #222;">
            <div id="list36">
                <div class="row36">
                    <div class="row mb-2 align-items-end">
                        <div class='col-md-1'>
                            <label>STT</label>
                            <input type='text' class='form-control' name='stt[]' readonly value='1'>
                        </div>
                        <div class="col-md-9">
                            <label class="form-label">Tên tài liệu</label>
                            <input type="text" class="form-control" placeholder="Text" name="f36_1_ten_tai_lieu[]">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Số tài liệu</label>
                            <input type="text" class="form-control" placeholder="Text" name="f36_2_so_tai_lieu[]">
                        </div>
                    </div>
                    <div class="row mb-2 align-items-end">
                        <div class="col-md-5">
                            <label class="form-label">Người nhận</label>
                            <input type="text" class="form-control" placeholder="Text" name="f36_3_nguoi_nhan[]">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Ngày gửi</label>
                            <input type="date" class="form-control" name="f36_4_ngay_gui[]">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Ghi chú</label>
                            <input type="text" class="form-control" name="f36_5_ghi_chu[]">
                        </div>
                        <div class='col-md-1 d-flex align-items-end'>
                            <button type='button' class='btn btn-danger btn-sm' onclick='removeRow(this,"list36","row36")'>Xóa</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" onclick="addRow36();">
                Add
            </button>
        </div>
    </div>
    <!-- end cụm 7 -->
    <div class="text-end mt-4">
    <button type="submit" class="btn btn-success px-4">
        <?= $isEdit ? 'Lưu cập nhật' : 'Lưu hồ sơ' ?>
    </button>
</div>
</form>

<?php if ( $isEdit && !empty( $don ) ): ?>
<script>
    document.addEventListener( 'DOMContentLoaded', function() {
        const data = <?php echo json_encode( $don, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ); ?>;
        const childData = <?php echo json_encode( $donChildren, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ); ?>;
        const toDateValue = function( value ) {
            if ( value === null || value === undefined || value === '' ) {
                return '';
            }
            return String( value ).slice( 0, 10 );
        };

        const setFieldValue = function( field, value ) {
            if ( !field ) {
                return;
            }

            if ( field.type === 'date' ) {
                field.value = toDateValue( value );
                return;
            }

            if ( field.tagName === 'TEXTAREA' ) {
                field.value = value ?? '';
                return;
            }

            field.value = value ?? '';
        };
        
        Object.keys( data ).forEach( function( key ) {
            const value = data[key];
            
            // Skip ID fields
            if ( key === 'id_don' || key === 'id' ) {
                return;
            }
            
            // Skip null or empty values
            if ( value === null || value === '' ) {
                return;
            }
            
            // Find all fields with this name (handles single and array fields)
            const fields = document.querySelectorAll( '[name="' + key + '"]' );
            
            if ( fields.length === 0 ) {
                console.log( 'Field not found:', key );
                return;
            }
            
            fields.forEach( function( field ) {
                setFieldValue( field, String( value ).trim() );
            } );
        } );

        const list33Data = Array.isArray( childData.list33 ) ? childData.list33 : [];
        if ( list33Data.length > 0 ) {
            const list33El = document.getElementById( 'list33' );
            if ( list33El ) {
                const currentRows = list33El.querySelectorAll( '.row33' );
                for ( let i = 1; i < currentRows.length; i++ ) {
                    currentRows[i].remove();
                }

                for ( let i = 1; i < list33Data.length; i++ ) {
                    if ( typeof window.addRow33 === 'function' ) {
                        window.addRow33();
                    }
                }

                const row33Els = list33El.querySelectorAll( '.row33' );
                list33Data.forEach( function( parentData, parentIndex ) {
                    const row33El = row33Els[parentIndex];
                    if ( !row33El || !parentData ) {
                        return;
                    }

                    const maVuViecField = row33El.querySelector( '[name="f33_1_ma_vu_viec[]"]' );
                    setFieldValue( maVuViecField, parentData.f33_1_ma_vu_viec );

                    const childRowsData = Array.isArray( parentData.children ) && parentData.children.length > 0
                        ? parentData.children
                        : [ {} ];

                    const addChildBtn = row33El.querySelector( '[onclick^="addRow33_1"]' );
                    for ( let i = 1; i < childRowsData.length; i++ ) {
                        if ( typeof window.addRow33_1 === 'function' ) {
                            window.addRow33_1( addChildBtn );
                        }
                    }

                    const childRowEls = row33El.querySelectorAll( '.row33_1' );
                    childRowsData.forEach( function( childRowData, childIndex ) {
                        const childRowEl = childRowEls[childIndex];
                        if ( !childRowEl || !childRowData ) {
                            return;
                        }

                        Object.keys( childRowData ).forEach( function( key ) {
                            const field = childRowEl.querySelector( '[name="' + key + '[]"]' )
                                || childRowEl.querySelector( '[name="' + key + '"]' );
                            setFieldValue( field, childRowData[key] );
                        } );
                    } );
                } );

                if ( typeof window.refreshRow33Metadata === 'function' ) {
                    window.refreshRow33Metadata();
                }
            }
        }

        const listConfigs = {
            list14: { rowClass: 'row', addFn: 'addRow14' },
            list18: { rowClass: 'row18', addFn: 'addRow18' },
            list19: { rowClass: 'row19', addFn: 'addRow19' },
            list20: { rowClass: 'row', addFn: 'addRow20' },
            list21: { rowClass: 'row', addFn: 'addRow21' },
            list22: { rowClass: 'row', addFn: 'addRow22' },
            list24: { rowClass: 'row', addFn: 'addRow24' },
            list25: { rowClass: 'row', addFn: 'addRow25' },
            list28: { rowClass: 'row28', addFn: 'addRow28' },
            list30: { rowClass: 'row30', addFn: 'addRow30' },
            list32: { rowClass: 'row', addFn: 'addRow32' },
            list34: { rowClass: 'row34', addFn: 'addRow34' },
            list35: { rowClass: 'row35', addFn: 'addRow35' },
            list36: { rowClass: 'row36', addFn: 'addRow36' }
        };

        Object.keys( listConfigs ).forEach( function( listId ) {
            const rowsData = Array.isArray( childData[listId] ) ? childData[listId] : [];
            if ( rowsData.length === 0 ) {
                return;
            }

            const config = listConfigs[listId];
            const listElement = document.getElementById( listId );
            if ( !listElement ) {
                return;
            }

            const addFn = window[config.addFn];
            if ( typeof addFn === 'function' ) {
                for ( let i = 1; i < rowsData.length; i++ ) {
                    addFn();
                }
            }

            const rowElements = listElement.querySelectorAll( '.' + config.rowClass );

            rowsData.forEach( function( rowData, rowIndex ) {
                const rowElement = rowElements[rowIndex];
                if ( !rowElement || !rowData ) {
                    return;
                }

                Object.keys( rowData ).forEach( function( key ) {
                    const candidates = [key + '[]', key];
                    let field = null;
                    for ( const candidate of candidates ) {
                        field = rowElement.querySelector( '[name="' + candidate + '"]' );
                        if ( field ) {
                            break;
                        }
                    }

                    setFieldValue( field, rowData[key] );
                } );
            } );
        } );
    } );
</script>
<?php endif; ?>
