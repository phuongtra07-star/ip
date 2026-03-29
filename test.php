<!DOCTYPE html>
<html lang='vi'>

<head>
    <meta charset='UTF-8'>
    <title>Trang Quản Lý Đơn Hàng</title>

    <!-- Bootstrap 5 -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'>

    <!-- Bootstrap Icons -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css' rel='stylesheet'>
    <script src='js/DonAdd.js'></script>
    <style>
        .row18 {
        border: 1px solid #007bff;
        border-radius: 0.25rem;
        padding: 0.5rem;
        margin-bottom: 0.75rem;
        }
    </style>
</head>
<body>
 <fieldset class="border p-2 rounded mb-2">
            <legend class="float-none w-auto px-2 fs-6 text-danger">Trạng thái bổ xung</legend>
            <div id="list14" class="list14">               
                
                    <div class="row mb-2">
                        <div class='col-md-1'>
                            <span class="input-group-text">STT</span>
                            <input type="text" class="form-control form-control-sm" name="stt[]" readonly value="1" >
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
            <button type="button" class="btn btn-primary btn-sm" onclick="addRow('list14', 'row','row14');"><i class='bi bi-plus-circle'></i> Add</button>
        </fieldset>
        
<SCRIPT>
        // const template = document.getElementById(tmp14);
        // const newRow = template.content.cloneNode(true);
        // alert(newRow);
</script>
  <!-- Bootstrap JS -->`
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js'></script>
    <script src='js/scripts.js'></script>
</body>