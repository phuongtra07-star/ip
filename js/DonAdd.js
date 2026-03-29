function refreshSTT(containerId, rowClass) {
    const rows = document.querySelectorAll(`#${containerId} .${rowClass}`);
    rows.forEach((row, index) => {
        const sttInput = row.querySelector("input[name='stt[]']");
        if (sttInput) {
            sttInput.value = index + 1;
        }
    });
}
function removeRow(el, containerId, rowClass) {
    if (!confirm('Bạn có chắc muốn xóa dòng này?')) return;
    const row = el.closest(`.${rowClass}`);
    if (!row) return;

    const rowCount = document.querySelectorAll(`#${containerId} .${rowClass}`).length;
    if (rowCount <= 1) {
        alert('Phải giữ ít nhất 1 dòng.');
        return;
    }

    row.remove();
    refreshSTT(containerId, rowClass);
}

function addRow(containerId, rowClass, templateId) {
    const container = document.getElementById(containerId);
    const template = document.getElementById(templateId);

    const currentCount = container.querySelectorAll(`.${rowClass}`).length;
    const nextSTT = currentCount + 1;

    const clone = template.content.cloneNode(true);

    // set STT
    const sttInput = clone.querySelector("input[name='stt[]']");
    if (sttInput) sttInput.value = nextSTT;

    // gán nút xóa
    const btnRemove = clone.querySelector('button');
    if (btnRemove) {
        btnRemove.onclick = function () {
            removeRow(this, containerId, rowClass);
        };
    }

    container.appendChild(clone);

    refreshSTT(containerId, rowClass);
}


function addRow14() {
    const currentCount = document.querySelectorAll('#list14 .row').length;
    const nextSTT = currentCount + 1;

    const html = `
        <div class='row mb-2'>
            <div class='col-md-1'>
                <label>STT</label>
                <input type='text' class='form-control' name='stt[]' readonly value='1'>
            </div>
            <div class='col-md-3'>
                <label for='f14-1-mota'>Mô tả</label>
                <input type='text' class='form-control'  name='f14_1_mota[]'>
            </div>
            <div class='col-md-3'>
                <label for='f14-2-ngay-lien-quan'>Ngày liên quan</label>
                <input type='date' class='form-control'  name='f14_2_ngay_lien_quan[]'>
            </div>
            <div class='col-md-4'>
                <label for='f14-3-ghi-chu'>Ghi chú</label>
                <input type='text' class='form-control'  name='f14_3_ghi_chu[]'>
            </div>
            <div class='col-md-1 d-flex align-items-end'>
                <button type='button' class='btn btn-danger btn-sm' onclick='removeRow(this, "list14", "row")'>Xóa</button>
            </div>
        </div>
        
    `;

    document.getElementById('list14').insertAdjacentHTML('beforeend', html);
    // Nếu muốn có nút xóa row, có thể thêm rồi gọi refreshSTT14() sau khi xóa
    refreshSTT('list14', 'row');
}
function addRow18() {
    const currentCount = document.querySelectorAll('#list18 .row18').length;
    const nextSTT = currentCount + 1;

    const html = `
        <div class="border row18 rounded mt-2 p-2" >
            <div class="row mb-2">
                <div class='col-md-1'>
                    <label>STT</label>
                    <input type='text' class='form-control' name='stt[]' readonly value='1'>
                </div>
                <div class="col-md-5">
                    <label for="ten_chu_don">Chủ đơn</label>
                    <input type="text" class="form-control"  name="f18_1_ten_chu_don[]">
                </div>
                <div class="col-md-6">
                    <label for="dia_chi_chu_don">Địa chỉ</label>
                    <input type="text" class="form-control"  name="f18_2_dia_chi_chu_don[]">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-2">
                    <label for="quoc_gia_chu_don">Quốc Gia</label>
                    <input type="text" class="form-control"  name="f18_3_quoc_gia_chu_don">
                </div>
                <div class="col-md-4">
                    <label for="mst_cc">MST/CC</label>
                    <input type="text" class="form-control"  name="f18_4_mst_cc[]">
                </div>
                <div class="col-md-5">
                    <label for="id_chu_don" class="text-danger">ID chủ đơn</label>
                    <input type="text" class="form-control"  name="f18_5_id_chu_don">
                </div>
                <div class='col-md-1 d-flex align-items-end'>
                    <button type='button' class='btn btn-danger btn-sm' onclick='removeRow(this, "list18", "row18")'>Xóa</button>
                </div>
            </div>
        </div>        
    `;

    document.getElementById('list18').insertAdjacentHTML('beforeend', html);
    // Nếu muốn có nút xóa row, có thể thêm rồi gọi refreshSTT18() sau khi xóa
    refreshSTT('list18', 'row18');
}
function addRow19() {
    const currentCount = document.querySelectorAll('#list19 .row19').length;
    const nextSTT = currentCount + 1;

    const html = `
        <div class="border row19 rounded mt-2 p-2" >
            <div class="row mb-2">
                <div class='col-md-1'>
                    <label>STT</label>
                    <input type='text' class='form-control' name='stt[]' readonly value='1'>
                </div>
                <div class="col-md-4">
                    <label for="tac_gia_1">Tác giả 1</label>
                    <input type="text" class="form-control"  name="f19_1_tac_gia_1[]">
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control"  name="f19_2_dia_chi_tac_gia[]">
                </div>
                <div class="col-md-2">
                    <label for="quoc_tich_tac_gia">Quốc tịch</label>
                    <input type="text" class="form-control"  name="f19_3_quoc_tich_tac_gia[]">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-4">
                    <label for="email_tac_gia">Email</label>
                    <input type="email" class="form-control"  name="f19_4_email_tac_gia[]">
                </div>
                <div class="col-md-4">
                    <label for="dien_thoai_tac_gia">Điện thoại</label>
                    <input type="text" class="form-control"  name="f19_5_dien_thoai_tac_gia[]">
                </div>
                <div class="col-md-3">
                    <label for="can_cuoc_tac_gia">Căn cước</label>
                    <input type="text" class="form-control"  name="f19_6_can_cuoc_tac_gia[]">
                </div>
                <div class='col-md-1 d-flex align-items-end'>
                    <button type='button' class='btn btn-danger btn-sm' onclick='removeRow(this, "list19", "row19")'>Xóa</button>
                </div>
            </div>
        </div>        
    `;

    document.getElementById('list19').insertAdjacentHTML('beforeend', html);
    // Nếu muốn có nút xóa row, có thể thêm rồi gọi refreshSTT19() sau khi xóa
    refreshSTT('list19', 'row19');
}

function addRow20() {
    const currentCount = document.querySelectorAll('#list20 .row').length;
    const nextSTT = currentCount + 1;

    const html = `
                <div class="row mb-2">
                    <div class='col-md-1'>
                        <label>STT</label>
                        <input type='text' class='form-control' name='stt[]' readonly value='1'>
                    </div>
                    <div class="col-md-3">
                        <label for="so_don_tham_chieu_1">Số đơn tham chiếu 1</label>
                        <input type="text" class="form-control" name="f20_1_so_don_tham_chieu[]">
                    </div>
                    <div class="col-md-3">
                        <label for="ngay_nop_tham_chieu_1">Ngày nộp</label>
                        <input type="date" class="form-control" name="f20_2_ngay_nop_tham_chieu[]">
                    </div>
                    <div class="col-md-4">
                        <label for="ngay_nop_tham_chieu_1">Ghi chú</label>
                        <input type="text" class="form-control"  name="f20_3_ghi_chu[]">
                    </div>
                    <div class='col-md-1 d-flex align-items-end'>
                        <button type='button' class='btn btn-danger btn-sm' onclick='removeRow(this, "list20", "row")'>Xóa</button>
                    </div>
                </div>
    `;

    document.getElementById('list20').insertAdjacentHTML('beforeend', html);
    // Nếu muốn có nút xóa row, có thể thêm rồi gọi refreshSTT20() sau khi xóa
    refreshSTT('list20', 'row');
}
function addRow21() {
    const currentCount = document.querySelectorAll('#list21 .row').length;
    const nextSTT = currentCount + 1;

    const html = `
        <div class="row mb-2">
            <div class='col-md-1'>
                <label>STT</label>
                <input type='text' class='form-control' name='stt[]' readonly value='1'>
            </div>
            <div class="col-md-3">
                <label for="so_don_uu_tien_1">Số đơn ưu tiên 1</label>
                <input type="text" class="form-control"  name="f21_1_so_don_uu_tien[]">
            </div>
            <div class="col-md-3">
                <label for="ngay_uu_tien">Ngày ưu tiên</label>
                <input type="date" class="form-control"  name="f21_2_ngay_uu_tien[]">
            </div>
            <div class="col-md-4">
                <label for="ma_nuoc">Mã nước</label>
                <input type="text" class="form-control" name="f21_3_ma_nuoc[]">
            </div>
            <div class='col-md-1 d-flex align-items-end'>
                <button type='button' class='btn btn-danger btn-sm' onclick='removeRow(this, "list21", "row")'>Xóa</button>
            </div>
        </div>
    `;

    document.getElementById('list21').insertAdjacentHTML('beforeend', html);
    // Nếu muốn có nút xóa row, có thể thêm rồi gọi refreshSTT21() sau khi xóa
    refreshSTT('list21', 'row');
}

function addRow22() {
    const currentCount = document.querySelectorAll('#list22 .row').length;
    const nextSTT = currentCount + 1;

    const html = `
        <div class="row mb-2">
            <div class='col-md-1'>
                <label>STT</label>
                <input type='text' class='form-control' name='stt[]' readonly value='1'>
            </div>
            <div class="col-md-2">
                <label for="contact1_ten">Contact</label>
                <input type="text" class="form-control"  name="f22_1_ten[]">
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
                <button type='button' class='btn btn-danger btn-sm' onclick='removeRow(this, "list22", "row")'>Xóa</button>
            </div>        
        </div>
    `;

    document.getElementById('list22').insertAdjacentHTML('beforeend', html);
    // Nếu muốn có nút xóa row, có thể thêm rồi gọi refreshSTT22() sau khi xóa
    refreshSTT('list22', 'row');
}

function addRow24 () {
    const currentCount = document.querySelectorAll('#list24 .row').length;
    const nextSTT = currentCount + 1;

    const html = `
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
                <button type='button' class='btn btn-danger btn-sm' onclick='removeRow(this, "list24", "row")'>Xóa</button>
            </div>
        </div>
    `;

    document.getElementById('list24').insertAdjacentHTML('beforeend', html);
    // Nếu muốn có nút xóa row, có thể thêm rồi gọi refreshSTT24() sau khi xóa
    refreshSTT('list24','row');
}
function addRow25 () {
    const currentCount = document.querySelectorAll('#list25 .row').length;
    const nextSTT = currentCount + 1;

    const html = `
        <div class="row mb-2">
            <div class='col-md-1'>
                <label>STT</label>
                <input type='text' class='form-control' name='stt[]' readonly value='1'>
            </div>
            <div class="col-md-2">
                <label for="thongbao_ht1">Thông báo HT1</label>
                <input type="date" class="form-control" name="f25_1thongbao_ht[]"
                    required />
            </div>
            <div class="col-md-2">
                <label for="deadline_ht1">Deadline HT1</label>
                <input type="date" class="form-control" name="f25_2_deadline_ht[]" />
            </div>                              
        
            <div class="col-md-2">
                <label for="giahan_ht1">Gia hạn HT1</label>
                <input type="date" class="form-control" name="f25_3_giahan_ht[]" required />
            </div>
            <div class="col-md-2">
                <label>Deadline GH1</label>
                <input type="date" class="form-control" name="f25_4_deadline_gh[]" />
            </div>
            <div class="col-md-2">
                <label>Ngày phúc đáp</label>
                <input type="date" class="form-control" name="f25_5_ngay_phuc_dap[]" />
            </div>
            <div class='col-md-1 d-flex align-items-end'>
                    <button type='button' class='btn btn-danger btn-sm' onclick='removeRow(this,"list25","row")'>Xóa</button>
            </div>
        </div>
    `;

    document.getElementById('list25').insertAdjacentHTML('beforeend', html);
    // Nếu muốn có nút xóa row, có thể thêm rồi gọi refreshSTT24() sau khi xóa
    refreshSTT('list25','row');
}
function addRow28 () {
    const currentCount = document.querySelectorAll('#list28 .row28').length;
    const nextSTT = currentCount + 1;

    const html = `
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
    `;

    document.getElementById('list28').insertAdjacentHTML('beforeend', html);
    // Nếu muốn có nút xóa row, có thể thêm rồi gọi refreshSTT() sau khi xóa
    refreshSTT('list28','row28');
}

function addRow30 () {
    const currentCount = document.querySelectorAll('#list30 .row30').length;
    const nextSTT = currentCount + 1;

    const html = `
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
    `;

    document.getElementById('list30').insertAdjacentHTML('beforeend', html);
    // Nếu muốn có nút xóa row, có thể thêm rồi gọi refreshSTT() sau khi xóa
    refreshSTT('list30','row30');
}


function addRow32 () {
    const currentCount = document.querySelectorAll('#list32 .row').length;
    const nextSTT = currentCount + 1;

    const html = `
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
    `;

    document.getElementById('list32').insertAdjacentHTML('beforeend', html);
    // Nếu muốn có nút xóa row, có thể thêm rồi gọi refreshSTT() sau khi xóa
    refreshSTT('list32','row');
}

function addRow33() {
    const currentCount = document.querySelectorAll('#list33 .row33').length;
    const nextSTT = currentCount + 1;

    const html = `
        <div class="row33" data-row33-index="${nextSTT}">               
            <div class="row mb-2">
                <div class='col-md-1'>
                    <label>STT</label>
                    <input type='text' class='form-control' name='stt[]' readonly value='${nextSTT}'>
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
                        <input type="hidden" name="f33_1_parent_index[]" value="${nextSTT}">
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
    
    `;
    document.getElementById('list33').insertAdjacentHTML('beforeend', html);
    refreshSTT('list33','row33');
    refreshRow33Metadata();
}

function addRow33_1(triggerEl) {
    const parentRow = triggerEl ? triggerEl.closest('.row33') : document.querySelector('#list33 .row33:last-child');
    const container = parentRow ? parentRow.querySelector('.list33_1') : null;
    if (!container) {
        return;
    }
    const parentIndex = parseInt(parentRow.getAttribute('data-row33-index') || '1', 10);
    const currentCount = container.querySelectorAll('.row33_1').length;
    const nextSTT = currentCount + 1;

    const html = `
        <div class="row33_1">
            <input type="hidden" name="f33_1_parent_index[]" value="${parentIndex}">
            <div class="row mb-2 align-items-end">
                <div class='col-md-1'>
                    <label>STT</label>
                    <input type='text' class='form-control' name='stt33_1[]' readonly value='${nextSTT}'>
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
    `;

    container.insertAdjacentHTML('beforeend', html);
}

function refreshRow33Metadata() {
    const rows33 = document.querySelectorAll('#list33 .row33');
    rows33.forEach((row33, parentIndex) => {
        const idx = parentIndex + 1;
        row33.setAttribute('data-row33-index', String(idx));

        const sttInput = row33.querySelector("input[name='stt[]']");
        if (sttInput) {
            sttInput.value = idx;
        }

        const childRows = row33.querySelectorAll('.row33_1');
        childRows.forEach((childRow) => {
            const parentHidden = childRow.querySelector("input[name='f33_1_parent_index[]']");
            if (parentHidden) {
                parentHidden.value = idx;
            }
        });
    });
}

function removeRow33(el) {
    const container = document.getElementById('list33');
    const rows = container ? container.querySelectorAll('.row33') : [];
    if (rows.length <= 1) {
        alert('Phải có ít nhất 1 dòng, không thể xóa!');
        return;
    }
    if (confirm('Bạn có chắc muốn xóa không?')) {
        const row = el.closest('.row33');
        if (row) {
            row.remove();
            refreshSTT('list33','row33');
            refreshRow33Metadata();
        }
    }
}

function refreshSTT33_1(container) {
    const rows = container.querySelectorAll('.row33_1');
    rows.forEach((row, index) => {
        const sttInput = row.querySelector("input[name='stt33_1[]']");
        if (sttInput) {
            sttInput.value = index + 1;
        }
    });
}

function removeRow33_1(el) {
    const container = el.closest('.row33')?.querySelector('.list33_1') || el.closest('.list33_1');
    if (!container) {
        return;
    }
    const rows = container.querySelectorAll('.row33_1');

    // Nếu chỉ còn 1 dòng thì không cho xóa
    if (rows.length <= 1) {
        alert('Phải có ít nhất 1 dòng, không thể xóa!');
        return;
    }
    if (confirm('Bạn có chắc muốn xóa không?')) {
        const row = el.closest('.row33_1');
        row.remove();
        refreshSTT33_1(container);
    }
}


function addRow34() {
    const currentCount = document.querySelectorAll('#list34 .row34').length;
    const nextSTT = currentCount + 1;

    const html = `
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
    `;
    document.getElementById('list34').insertAdjacentHTML('beforeend', html);
    // Nếu muốn có nút xóa row, có thể thêm rồi gọi refreshSTT() sau khi xóa
    refreshSTT('list34','row34');
}
function addRow35() {
    const currentCount = document.querySelectorAll('#list35 .row35').length;
    const nextSTT = currentCount + 1;

    const html = `
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
    `;
    document.getElementById('list35').insertAdjacentHTML('beforeend', html);
    // Nếu muốn có nút xóa row, có thể thêm rồi gọi refreshSTT() sau khi xóa
    refreshSTT('list35','row35');
}

function addRow36() {
    const currentCount = document.querySelectorAll('#list36 .row36').length;
    const nextSTT = currentCount + 1;

    const html = `
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
    `;
    document.getElementById('list36').insertAdjacentHTML('beforeend', html);
    // Nếu muốn có nút xóa row, có thể thêm rồi gọi refreshSTT() sau khi xóa
    refreshSTT('list36','row36');
}