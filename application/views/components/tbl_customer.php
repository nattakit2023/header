<table class="table table-bordered table-hover" id="tblCustomer">

    <thead>

        <tr class="text-center">

            <th style="width: 18%">Vessel</th>

            <th style="width: 25%">Name</th>

            <th style="width: 15%">Telephone</th>

            <th style="width: 20%">Email</th>

            <th style="width: 22%">Option</th>

        </tr>

    </thead>

    <tbody>

        <?php foreach ($customers as $item) : ?>

            <tr id="item<?= $item->service_id; ?>">

                <td><?= $item->ves_name ?></td>

                <td><?= $item->cus_name; ?></td>

                <td><?= $item->cus_tel; ?></td>

                <td><?= $item->cus_email; ?></td>

                <td class="text-center">

                    <a href="<?=base_url();?>pages/customer_detail/<?= $item->service_id; ?>" class="btn btn-flat btn-default btn-sm">Service History</a>

                    <button type="button" onclick="getCustomer('<?= $item->service_id; ?>');" title="แก้ไขข้อมูลลูกค้า" class="btn btn-outline-primary btn-sm btn-flat" data-toggle="modal" data-target="#modalEditCustomer">

                        <i class="fas fa-edit"></i>

                    </button>

                    <button onclick="delCustomer('<?= $item->service_id; ?>')" class="btn btn-flat btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>

                </td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>





<!-- Modal -->

<div class="modal fade" id="modalEditCustomer" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">

    <div class="modal-dialog rounded-0" role="document">

        <div class="modal-content rounded-0">

            <div class="modal-header bg-dark rounded-0">

                <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Customer <strong id="showTitleCus"></strong></h5>

                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-12 mb-2">

                        <label>Name :</label>

                        <input type="text" id="cus_name" class="form-control rounded-0" placeholder="Name">

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-5 mb-2">

                        <label>Telephone :</label>

                        <input type="text" id="cus_tel" class="form-control rounded-0" placeholder="Telephone" oninput="this.value=this.value.replace(/[^0-9\\s]/g,'');">

                    </div>

                    <div class="col-md-7 mb-2">

                        <label>Tax :</label>

                        <input type="text" id="cus_tax" class="form-control rounded-0" placeholder="Tax" oninput="this.value=this.value.replace(/[^0-9\\s]/g,'');">

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12 mb-2">

                        <label>Address :</label>

                        <textarea id="cus_address" rows="3" class="form-control rounded-0" placeholder="Address"></textarea>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12">

                        <p class="text-muted"><strong>Note : </strong> ประวัติการทำรายการที่ส่งก่อนหน้านี้ยังเป็นข้อมูลเดิม</p>

                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" id="updateCustomer" class="btn btn-primary btn-flat">Save</button>

                <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Cancle</button>

            </div>

        </div>

    </div>

</div>

<input type="hidden" id="cus_id">

<script>

    //delete customer

    function delCustomer(cus_id) {

        Swal.fire({

            title: 'ลบข้อมูล',

            text: "ต้องการที่จะลบข้อมูล?",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonText: 'ตกลง',

            cancelButtonText: 'ยกเลิก'

        }).then((result) => {

            if (result.isConfirmed) {

                Swal.fire({

                    html: 'กำลังลบข้อมูล กรุณารอสักครู่....',

                    timer: 2000,

                    timerProgressBar: true,

                    didOpen: () => {

                        Swal.showLoading();

                        $.ajax({

                            url: '<?=base_url();?>customer/del_customer',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                cus_id : cus_id

                            },

                            success: function(res) {

                                if (res.status == 'SUCCESS') {

                                    Swal.fire({

                                        icon: 'success',

                                        title: 'สำเร็จ',

                                        text : 'ทำการลบข้อมูลเรียบร้อยแล้ว',

                                        showConfirmButton: false,

                                        timer: 1500

                                    });

                                    $('#item'+cus_id).hide();

                                } else {

                                    Swal.fire({

                                        icon : 'error',

                                        title : 'ผิดพลาด',

                                        html : res.message,

                                        confirmButtonText : 'ตกลง'

                                    });

                                    return false;

                                }

                            }

                        })

                    }

                })

            }

        })

    }

    //get data customer

    function getCustomer(cus_id) {

        $.ajax({

            url: '<?=base_url();?>customer/get_customer',

            method: 'POST',

            data: {

                cus_id: cus_id

            },

            dataType: 'JSON',

            success: function(res) {

                if (res.status == 'SUCCESS') {

                    $('#cus_id').val(res.data.cus_id);

                    $('#cus_name').val(res.data.cus_name);

                    $('#cus_tel').val(res.data.cus_tel);

                    $('#cus_tax').val(res.data.cus_tax);

                    $('#cus_address').val(res.data.cus_address);

                    $('#showTitleCus').html(res.data.cus_name);

                } else {

                    console.log(res);

                }

            }

        })

    }

    //update Customer

    $(document).on('click', '#updateCustomer', function() {

        let cus_id = $('#cus_id').val();

        let cus_name = $('#cus_name').val();

        let cus_tel = $("#cus_tel").val();

        let cus_tax = $('#cus_tax').val();

        let cus_address = $('#cus_address').val();



        if (cus_id == '' || cus_name == '' || cus_tel == '' || cus_address == '') {

            Swal.fire({

                icon: 'warning',

                title: 'แจ้งเตือน',

                text: 'กรุณากรอกข้อมูลที่จำเป็นให้ครบถ้วน',

                confirmButtonText: 'ตกลง'

            });

            return false;

        }



        Swal.fire({

            title: 'อัพเดตข้อมูล',

            text: "ต้องการอัพเดตข้อมูลลูกค้านี้?",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonText: 'ตกลง',

            cancelButtonText: 'ยกเลิก'

        }).then((result) => {

            if (result.isConfirmed) {

                Swal.fire({

                    html: 'กำลังบันทึกข้อมูล กรุณารอสักครู่...',

                    allowEnterKey: false,

                    allowEscapeKey: false,

                    allowOutsideClick: false,

                    timer: 2000,

                    timerProgressBar: true,

                    didOpen: () => {

                        Swal.showLoading();

                        $.ajax({

                            url: '<?=base_url();?>customer/update_customer',

                            method: 'POST',

                            dataType: 'JSON',

                            data: {

                                cus_id: cus_id,

                                cus_name: cus_name,

                                cus_tel: cus_tel,

                                cus_tax: cus_tax,

                                cus_address: cus_address

                            },

                            success: function(res) {

                                if (res.status == 'SUCCESS') {

                                    Swal.fire({

                                        icon: 'success',

                                        title: 'สำเร็จ',

                                        text: 'อัพเดตข้อมูลลูกค้าเรียบร้อยแล้ว',

                                        showConfirmButton: false,

                                        timer: 1500

                                    });

                                    setInterval(function() {

                                        window.location.reload();

                                    }, 1400);

                                } else {

                                    Swal.fire({

                                        icon: 'error',

                                        title: 'ผิดพลาด',

                                        html: res.message,

                                        confirmButtonText: 'ตกลง'

                                    });

                                    return false;

                                }

                            }

                        })

                    }

                });

            }

        })

    })

    $('#tblCustomer').DataTable({

        "paging": true,

        "lengthChange": false,

        "searching": false,

        "ordering": false,

        "info": false,

        "autoWidth": false,

        "responsive": true,

        "pageLength": 25,

        language: {

            search: "ค้นหา :",

            searchPlaceholder: "ค้นหาข้อมูลในตาราง",

            "lengthMenu": "แสดง _MENU_ รายการ/หน้า",

            "zeroRecords": "--ไม่พบข้อมูล--",

            "paginate": {

                "first": "<<",

                "last": ">>",

                "next": ">",

                "previous": "<"

            },

            "info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",

        },

    });

</script>
