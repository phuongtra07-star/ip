// Thêm cụm 14
function refreshSTT14() {
    const rows = document.querySelectorAll('#list14 .row');
    rows.forEach((row, index) => {
        const sttInput = row.querySelector("input[name='stt[]']");
        if (sttInput) {
            sttInput.value = index + 1;
        }
    });
}

function removeRow14(el) {
    alert('Bạn có chắc muốn xóa dòng này?');
    const row = el.closest('.row');
    if (!row) return;

    const rowCount = document.querySelectorAll('#list14 .row').length;
    if (rowCount <= 1) {
        alert('Phải giữ ít nhất 1 dòng.');
        return;
    }

    row.remove();
    refreshSTT14();
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
                <input type='text' class='form-control' id='f14-1-mota' name='f14_1_mota[]'>
            </div>
            <div class='col-md-3'>
                <label for='f14-2-ngay-lien-quan'>Ngày liên quan</label>
                <input type='date' class='form-control' id='f14-2-ngay-lien-quan' name='f14_2_ngay_lien_quan[]'>
            </div>
            <div class='col-md-4'>
                <label for='f14-3-ghi-chu'>Ghi chú</label>
                <input type='text' class='form-control' id='f14-3-ghi-chu' name='f14_3_ghi_chu[]'>
            </div>
            <div class='col-md-1 d-flex align-items-end'>
                <button type='button' class='btn btn-danger btn-sm' onclick='removeRow14(this)'>Xóa</button>
            </div>
        </div>
        
    `;

    document.getElementById('list14').insertAdjacentHTML('beforeend', html);
    // Nếu muốn có nút xóa row, có thể thêm rồi gọi refreshSTT14() sau khi xóa
    refreshSTT14();
}
// end thêm cụm 14

// thêm cụm 18
function refreshSTT18() {
    const rows = document.querySelectorAll('#list18 .row18');
    rows.forEach((row, index) => {
        const sttInput = row.querySelector("input[name='stt[]']");
        if (sttInput) {
            sttInput.value = index + 1;
        }
    });
}

function removeRow18(el) {
    alert('Bạn có chắc muốn xóa dòng này?');
    const row = el.closest('.row18');
    if (!row) return;

    const rowCount = document.querySelectorAll('#list18 .row18').length;
    if (rowCount <= 1) {
        alert('Phải giữ ít nhất 1 dòng.');
        return;
    }

    row.remove();
    refreshSTT18();
}

function addRow18() {
    const currentCount = document.querySelectorAll('#list18 .row18').length;
    const nextSTT = currentCount + 1;

    const html = `
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
                    <button type='button' class='btn btn-danger btn-sm' onclick='removeRow18(this)'>Xóa</button>
                </div>
            </div>
        </div>        
    `;

    document.getElementById('list18').insertAdjacentHTML('beforeend', html);
    // Nếu muốn có nút xóa row, có thể thêm rồi gọi refreshSTT18() sau khi xóa
    refreshSTT18();
}
// end thêm cụm 18

// thêm cụm 19
function refreshSTT19() {
    const rows = document.querySelectorAll('#list19 .row19');
    rows.forEach((row, index) => {
        const sttInput = row.querySelector("input[name='stt[]']");
        if (sttInput) {
            sttInput.value = index + 1;
        }
    });
}

function removeRow19(el) {
    alert('Bạn có chắc muốn xóa dòng này?');
    const row = el.closest('.row19');
    if (!row) return;

    const rowCount = document.querySelectorAll('#list19 .row19').length;
    if (rowCount <= 1) {
        alert('Phải giữ ít nhất 1 dòng.');
        return;
    }

    row.remove();
    refreshSTT19();
}

function addRow19() {
    const currentCount = document.querySelectorAll('#list19 .row19').length;
    const nextSTT = currentCount + 1;

    const html = `
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
                    <button type='button' class='btn btn-danger btn-sm' onclick='removeRow19(this)'>Xóa</button>
                </div>
            </div>
        </div>        
    `;

    document.getElementById('list19').insertAdjacentHTML('beforeend', html);
    // Nếu muốn có nút xóa row, có thể thêm rồi gọi refreshSTT19() sau khi xóa
    refreshSTT19();
}
// end thêm cụm 19

// thêm cụm 20
function refreshSTT20() {
    const rows = document.querySelectorAll('#list20 .row');
    rows.forEach((row, index) => {
        const sttInput = row.querySelector("input[name='stt[]']");
        if (sttInput) {
            sttInput.value = index + 1;
        }
    });
}

function removeRow20(el) {
    alert('Bạn có chắc muốn xóa dòng này?');
    const row = el.closest('.row');
    if (!row) return;

    const rowCount = document.querySelectorAll('#list20 .row').length;
    if (rowCount <= 1) {
        alert('Phải giữ ít nhất 1 dòng.');
        return;
    }

    row.remove();
    refreshSTT20();
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
                        <button type='button' class='btn btn-danger btn-sm' onclick='removeRow20(this)'>Xóa</button>
                    </div>
                </div>
    `;

    document.getElementById('list20').insertAdjacentHTML('beforeend', html);
    // Nếu muốn có nút xóa row, có thể thêm rồi gọi refreshSTT20() sau khi xóa
    refreshSTT20();
}
// end thêm cụm 20
// cụm 21
function refreshSTT21() {
    const rows = document.querySelectorAll('#list21 .row');
    rows.forEach((row, index) => {
        const sttInput = row.querySelector("input[name='stt[]']");
        if (sttInput) {
            sttInput.value = index + 1;
        }
    });
}

function removeRow21(el) {
    alert('Bạn có chắc muốn xóa dòng này?');
    const row = el.closest('.row');
    if (!row) return;

    const rowCount = document.querySelectorAll('#list21 .row').length;
    if (rowCount <= 1) {
        alert('Phải giữ ít nhất 1 dòng.');
        return;
    }

    row.remove();
    refreshSTT21();
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
                <button type='button' class='btn btn-danger btn-sm' onclick='removeRow21(this)'>Xóa</button>
            </div>
        </div>
    `;

    document.getElementById('list21').insertAdjacentHTML('beforeend', html);
    // Nếu muốn có nút xóa row, có thể thêm rồi gọi refreshSTT21() sau khi xóa
    refreshSTT21();
}
// end thêm cụm 21
// cụm 22
function refreshSTT22() {
    const rows = document.querySelectorAll('#list22 .row');
    rows.forEach((row, index) => {
        const sttInput = row.querySelector("input[name='stt[]']");
        if (sttInput) {
            sttInput.value = index + 1;
        }
    });
}

function removeRow22(el) {
    alert('Bạn có chắc muốn xóa dòng này?');
    const row = el.closest('.row');
    if (!row) return;

    const rowCount = document.querySelectorAll('#list22 .row').length;
    if (rowCount <= 1) {
        alert('Phải giữ ít nhất 1 dòng.');
        return;
    }

    row.remove();
    refreshSTT22();
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
                <button type='button' class='btn btn-danger btn-sm' onclick='removeRow22(this)'>Xóa</button>
            </div>
        </div>
    `;

    document.getElementById('list22').insertAdjacentHTML('beforeend', html);
    // Nếu muốn có nút xóa row, có thể thêm rồi gọi refreshSTT22() sau khi xóa
    refreshSTT22();
}
// end thêm cụm 22
// Cụm 24
function refreshSTT24() {
    const rows = document.querySelectorAll('#list24 .row');
    rows.forEach((row, index) => {
        const sttInput = row.querySelector("input[name='stt[]']");
        if (sttInput) {
            sttInput.value = index + 1;
        }
    });
}

function removeRow24(el) {
    alert('Bạn có chắc muốn xóa dòng này?');
    const row = el.closest('.row');
    if (!row) return;

    const rowCount = document.querySelectorAll('#list24 .row').length;
    if (rowCount <= 1) {
        alert('Phải giữ ít nhất 1 dòng.');
        return;
    }

    row.remove();
    refreshSTT24();
}
function addRow24() {
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
                <button type='button' class='btn btn-danger btn-sm' onclick='removeRow24(this)'>Xóa</button>
            </div>
        </div>
    `;

    document.getElementById('list24').insertAdjacentHTML('beforeend', html);
    // Nếu muốn có nút xóa row, có thể thêm rồi gọi refreshSTT24() sau khi xóa
    refreshSTT24();
}

// end thêm cụm 24