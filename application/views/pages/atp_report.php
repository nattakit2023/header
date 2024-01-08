<style>
    .checkbox {
        text-align: center;
    }

    .container {
        padding-top: 30px;
    }

    .container .detail {
        padding-top: 30px;
    }

    .container .detail .data {
        padding-left: 30px;
    }

    .tableheaderdetail {
        border-collapse: collapse;
        width: 50%;
    }

    .tableheaderdetail td {
        border: 1px solid #333;
        height: 20px;
    }

    .tabledetail {
        border-collapse: collapse;
        width: 50%;
    }

    .tabledetail td {
        border: 1px solid #333;
        height: 20px;
        text-align: center;
    }

    .textcenter {
        text-align: center;
    }
</style>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h3><i class="fas fa-tools"></i><strong> Create ATP Report</strong></h3>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>/pages">Index</a></li>

                        <li class="breadcrumb-item active">Create ATP Report</li>

                    </ol>

                </div>

            </div>

        </div><!-- /.container-fluid -->

    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12 mb-2">

                    <div class="card rounded-0">

                        <div class="card-header bg-dark rounded-0">

                            ATP Information

                        </div>


                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-3">
                                    <p class="text-primary">
                                        <i class="fas fa-circle"></i>
                                        Page 2 (Ravision History)
                                        <button style="margin-left:20px;" type="button" class="btn btn-primary rounded-0" onclick="addpage2()"><i class="fas fa-plus"></i> Add </button>
                                    </p>
                                </div>
                            </div>

                            <div class="row" id="page2">

                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <p class="text-primary">
                                        <i class="fas fa-circle"></i>
                                        Page 4 (Service description)
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 mb-2 ">
                                    <strong style="font-size: 16px;"> Network diagram :</strong>
                                    <input type="file" name="files" id="files_network" multiple>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <p class="text-primary"><i class="fas fa-circle"></i> Page 6 (System function test)</p>
                                </div>
                            </div>

                            <div class="row">
                                <table class="tabledetail">
                                    <tr>
                                        <td style="width: 10%;">Item</td>
                                        <td style="width: 50%;">Test proceduce</td>
                                        <td style="width: 10%;">Test Result</td>
                                        <td style="width: 30%;"> Remark</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <table class="tableheaderdetail">
                                    <tr>
                                        <td>
                                            <strong>3.1 Satellite acquisition test</strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <table class="tableheaderdetail">
                                    <tr>
                                        <td class="textcenter" style="width:10%;">
                                            <strong>1</strong>
                                        </td>
                                        <td style="width:50%;">
                                            <strong>
                                                <p>Verify that the antenna is installed at the location that has no obstruction to satellite lookup angle</p>
                                            </strong>
                                        </td>
                                        <td style="width:10%;">
                                            <div class="checkbox">
                                                <strong><input type="checkbox" id="page6_11" name="page6_11"></strong>
                                            </div>
                                        </td>
                                        <td class="textcenter" style="width:30%;">
                                            <strong>
                                                <div class="col-md-12 mb-2">
                                                    <textarea id="remark_page6" class="form-control rounded-0" placeholder="Remark" required></textarea>
                                                </div>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="textcenter"><strong>2</strong></td>
                                        <td><strong>
                                                <p>Power on the antenna control unit (ACU) and modem</p>
                                            </strong>
                                        </td>
                                        <td>
                                            <strong>
                                                <div class="checkbox">
                                                    <strong><input type="checkbox" id="page6_12" name="page6_12"></strong>
                                                </div>
                                            </strong>
                                        </td>
                                        <td class="textcenter" rowspan="2"><strong>Please refer to figure B1 of Appendix B: Test result</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="textcenter"><strong>3</strong></td>
                                        <td><strong>
                                                <p>Antenna can track the satellite</p>
                                            </strong>
                                        </td>
                                        <td>
                                            <strong>
                                                <div class="checkbox">
                                                    <strong><input type="checkbox" id="page6_13" name="page6_13"></strong>
                                                </div>
                                            </strong>
                                        </td>

                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <table class="tableheaderdetail">
                                    <tr>
                                        <td>
                                            <strong>3.2 Satellite communication system test</strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <table class="tableheaderdetail">
                                    <tr>
                                        <td class="textcenter" style="width:10%;">
                                            <strong>1</strong>
                                        </td>
                                        <td style="width:50%;">
                                            <strong>
                                                <p>Test the speed of satellite connection with the designated speed test server.</p>
                                                <p>Download speed &nbsp; = <input type="text" class="form-control rounded-0" id="download" placeholder="Download Speed"> Mbps</p>
                                                <p>Upload speed &nbsp; = <input type="text" class="form-control rounded-0" id="upload" placeholder="Upload Speed"> Mbps</p>
                                                <p><strong>Remark:</strong>The speed of satellite connection shall be more than Committed Speed and wihthin Maximum Speed</p>
                                            </strong>
                                        </td>
                                        <td style="width:10%;">
                                            <strong>
                                                <div class="checkbox">
                                                    <strong><input type="checkbox" id="page6_21" name="page6_21"></strong>
                                                </div>
                                            </strong>
                                        </td>
                                        <td class="textcenter" style="width:30%;">
                                            <strong>
                                                <p>Please refer to figure B3 Appendix B: Test result</p>
                                            </strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <table class="tableheaderdetail">
                                    <tr>
                                        <td>
                                            <strong>3.3 Payment Gateway test</strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <table class="tableheaderdetail">
                                    <tr>
                                        <td class="textcenter" style="width:10%;">
                                            <strong>1</strong>
                                        </td>
                                        <td style="width:50%;">
                                            <strong>
                                                <p>Test access to billing gateway and buy point</p>
                                            </strong>
                                        </td>
                                        <td style="width:10%;">
                                            <strong>
                                                <div class="checkbox">
                                                    <strong><input type="checkbox" id="page6_31" name="page6_31"></strong>
                                                </div>
                                            </strong>
                                        </td>
                                        <td class="textcenter" style="width:30%;">
                                            <strong>Test with Crew if don't have Shipexpert controller skip this topic</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="textcenter"><strong>2</strong></td>
                                        <td><strong>
                                                <p>Transfer point to another account</p>
                                            </strong>
                                        </td>
                                        <td>
                                            <strong>
                                                <div class="checkbox">
                                                    <strong><input type="checkbox" id="page6_32" name="page6_32"></strong>
                                                </div>
                                            </strong>
                                        </td>
                                        <td class="textcenter"><strong>Test with Crew if don't have Shipexpert controller skip this topic</strong></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <table class="tableheaderdetail">
                                    <tr>
                                        <td>
                                            <strong>3.4 Internet access via WIFI access point test</strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row mb-2">
                                <table class="tableheaderdetail">
                                    <tr>
                                        <td class="textcenter" style="width:10%;">
                                            <strong>1</strong>
                                        </td>
                                        <td style="width:50%;">
                                            <strong>
                                                <p>Test Internet access by browsing the following</p>
                                                <p>websites. http://www.google.com and specified</p>
                                                <p>websites. http://www.shipexpert.net/</p>
                                            </strong>
                                        </td>
                                        <td style="width:10%;">
                                            <strong>
                                                <div class="checkbox">
                                                    <strong><input type="checkbox" id="page6_41" name="page6_41"></strong>
                                                </div>
                                            </strong>
                                        </td>
                                        <td class="textcenter" style="width:30%;">
                                            <strong>
                                                <p>Please refer to figure B3 Appendix B: Test result</p>
                                            </strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <p class="text-primary"><i class="fas fa-circle"></i> Page 7 (System function test (Cont.))</p>
                                </div>
                            </div>

                            <div class="row">
                                <table class="tabledetail">
                                    <tr>
                                        <td style="width: 10%;">Item</td>
                                        <td style="width: 50%;">Test proceduce</td>
                                        <td style="width: 10%;">Test Result</td>
                                        <td style="width: 30%;"> Remark</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <table class="tableheaderdetail">
                                    <tr>
                                        <td>
                                            <strong>3.4 Internet access (VOIP) [fix MAC Address] test </strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row mb-2">
                                <table class="tableheaderdetail">
                                    <tr>
                                        <td class="textcenter" style="width:10%;">
                                            <strong>1</strong>
                                        </td>
                                        <td style="width:50%;">
                                            <strong>
                                                <p>Mac Address: <input type="text" class="form-control rounded-0" id="mac_page7" placeholder="Mac Address"></p>
                                                <p>Type of device: <input type="text" class="form-control rounded-0" id="type_page7" placeholder="Type of device"></p>
                                                <p>Email address: <input type="text" class="form-control rounded-0" id="email_page7" placeholder="Email address"></p>
                                                <p>and test internet access by browsing the following</p>
                                                <p>websites: <input type="text" class="form-control rounded-0" id="website_page7" placeholder="websites"></p>
                                            </strong>
                                        </td>
                                        <td style="width:10%;">
                                            <strong>
                                                <div class="checkbox">
                                                    <strong><input type="checkbox" id="page7_41" name="page7_41"></strong>
                                                </div>
                                            </strong>
                                        </td>
                                        <td class="textcenter" style="width:30%;">
                                            <strong>
                                                <p>Please refer to figure B3 Appendix B: Test result</p>
                                            </strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <p class="text-primary"><i class="fas fa-circle"></i> Page 8 (Additional information)</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <textarea id="add_info" class="form-control rounded-0" placeholder="Additional" required></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-primary"><i class="fas fa-circle"></i> Page 10 (Appendix A : Physical installation of equipment)</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 mb-2 ">
                                    <strong style="font-size: 16px;"> Appendix A :</strong>
                                    <input type="file" name="files" id="files_app_a" multiple>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-primary"><i class="fas fa-circle"></i> Page 11 (Appendix B : Test Result)</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 mb-2 ">
                                    <strong style="font-size: 16px;"> Appendix B :</strong>
                                    <input type="file" name="files" id="files_app_b" multiple>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-primary"><i class="fas fa-circle"></i> Page 12 (Appendix C : STELLAR Captive portal)</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 mb-2 ">
                                    <strong style="font-size: 16px;"> Appendix C :</strong>
                                    <input type="file" name="files" id="files_app_c" multiple>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-12 mt-2">

                                    <button id="createATP" class="btn btn-primary rounded-0">Create</button>

                                    <button onclick="clearForm()" class="btn btn-default rounded-0">Clear</button>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>


<script>
    //-------------------------------------------------------------------------S C R I P T-----------------------------------------------------------------------------------

    //clear form

    function clearFormAll() {

        $('#').val('');

        $('#').val('');

        $('#').val('');

    }

    const input = document.getElementById("page2");

    var invoice = <?= $service->service_invoice ?>;

    var count_page2 = 1;

    function addpage2() {

        const date_label = document.createElement("label");
        date_label.innerHTML = "Date:"

        const date = document.createElement("input");
        date.type = "date";
        date.className = "form-control rounded-0";
        date.id = "date_page2" + count_page2;

        const author_label = document.createElement("label");
        author_label.innerHTML = "Author:"

        const author = document.createElement("input");
        author.type = "text";
        author.className = "form-control rounded-0";
        author.placeholder = "author";
        author.id = "author_page2" + count_page2;

        const version_label = document.createElement("label");
        version_label.innerHTML = "Version:"

        const version = document.createElement("input");
        version.type = "text";
        version.className = "form-control rounded-0";
        version.placeholder = "version";
        version.id = "version_page2" + count_page2;

        const detail_label = document.createElement("label");
        detail_label.innerHTML = "detail :"

        const detail = document.createElement("textarea");
        detail.className = "form-control rounded-0";
        detail.placeholder = "detail";
        detail.id = "detail_page2" + count_page2;

        const div1 = document.createElement("div");
        div1.className = "col-md-2 mb-2 flex";

        const div2 = document.createElement("div");
        div2.className = "col-md-2 mb-2 flex";

        const div3 = document.createElement("div");
        div3.className = "col-md-2 mb-2 flex";

        const div4 = document.createElement("div");
        div4.className = "col-md-2 mb-2 flex";

        const div5 = document.createElement("div");
        div5.className = "col-md-2 mb-2 flex";

        const div6 = document.createElement("div");
        div6.className = "col-md-2 mb-2 flex";

        input.append(div1);
        input.append(div2);
        input.append(div3);
        input.append(div4);
        input.append(div5);
        input.append(div6);
        div1.appendChild(date_label);
        div1.appendChild(date);
        div2.appendChild(author_label);
        div2.appendChild(author);
        div3.appendChild(version_label);
        div3.appendChild(version);
        div4.appendChild(detail_label);
        div4.appendChild(detail);

        count_page2++;
    }

    function removepage2() {

    }

    $(document).ready(function() {

    });



    // Create ATP

    $(document).on('click', '#createATP', function() {

        var formdata = new FormData();

        let files_network = $('#files_network')[0].files;

        let files_app_a = $('#files_app_a')[0].files;

        let files_app_b = $('#files_app_b')[0].files;

        let files_app_c = $('#files_app_c')[0].files;

        let remark_page6 = $('#remark_page6').val();

        let download = $('#download').val();

        let upload = $('#upload').val();

        let mac_page7 = $('#mac_page7').val();

        let type_page7 = $('#type_page7').val();

        let email_page7 = $('#email_page7').val();

        let website_page7 = $('#website_page7').val();

        let add_info = $('#add_info').val();

        let page6_11 = document.getElementById('page6_11').checked;

        formdata.append('page6_11', page6_11);

        let page6_12 = document.getElementById('page6_12').checked;

        formdata.append('page6_12', page6_12);

        let page6_13 = document.getElementById('page6_13').checked;

        formdata.append('page6_13', page6_13);

        let page6_21 = document.getElementById('page6_21').checked;

        formdata.append('page6_21', page6_21);

        let page6_31 = document.getElementById('page6_31').checked;

        formdata.append('page6_31', page6_31);

        let page6_32 = document.getElementById('page6_32').checked;

        formdata.append('page6_32', page6_32);

        let page6_41 = document.getElementById('page6_41').checked;

        formdata.append('page6_41', page6_41);

        let page7_41 = document.getElementById('page7_41').checked;

        formdata.append('page7_41', page7_41);

        formdata.append('service_invoice', invoice);

        formdata.append('remark_page6', remark_page6);

        formdata.append('download', download);

        formdata.append('upload', upload);

        formdata.append('mac_page7', mac_page7);

        formdata.append('type_page7', type_page7);

        formdata.append('email_page7', email_page7);

        formdata.append('website_page7', website_page7);

        formdata.append('add_info', add_info);

        formdata.append('count', count_page2);

        for (var index = 1; index < count_page2; index++) {
            formdata.append('date[]', $('#date_page2' + index).val());

            formdata.append('author[]', $('#author_page2' + index).val());

            formdata.append('version[]', $('#version_page2' + index).val());

            formdata.append('detail[]', $('#detail_page2' + index).val());
        }

        for (var index = 0; index < files_network.length; index++) {
            formdata.append('files_network[]', files_network[index]);
        }

        for (var index = 0; index < files_app_a.length; index++) {
            formdata.append('files_app_a[]', files_app_a[index]);
        }

        for (var index = 0; index < files_app_b.length; index++) {
            formdata.append('files_app_b[]', files_app_b[index]);
        }

        for (var index = 0; index < files_app_c.length; index++) {
            formdata.append('files_app_c[]', files_app_c[index]);
        }


        if (remark_page6 == '' || download == '' || upload == '' || mac_page7 == '' || type_page7 == '' || email_page7 == '' || website_page7 == '' || add_info == '') {

            Swal.fire({

                icon: 'warning',

                title: 'แจ้งเตือน',

                text: 'กรุณากรอกข้อมูลให้ครบถ้วน',

                confirmButtonText: 'ตกลง'

            });

            return false;

        }

        Swal.fire({

            title: 'เพิ่มผู้ใช้บริการ',

            text: "ต้องการสร้างรายการซ่อมนี้?",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonText: 'ตกลง',

            cancelButtonText: 'ยกเลิก'

        }).then((result) => {

            if (result.isConfirmed) {

                Swal.fire({

                    allowEnterKey: false,

                    allowEscapeKey: false,

                    allowOutsideClick: false,

                    html: 'กำลังสร้างรายการ กรุณารอสักครู่...',

                    timerProgressBar: true,

                    didOpen: () => {

                        Swal.showLoading();

                        $.ajax({

                            url: '<?= base_url(); ?>/service/create_atp',

                            method: 'POST',

                            dataType: 'JSON',

                            data: formdata,

                            processData: false,

                            contentType: false,

                            success: function(res) {

                                if (res.status == 'SUCCESS') {

                                    Swal.fire({

                                        icon: 'success',

                                        title: 'สำเร็จ',

                                        text: 'สร้างรายการซ่อมสำเร็จ',

                                        showConfirmButton: false,

                                        timer: 1500

                                    });

                                    setTimeout(function() {

                                        window.location.assign('<?= base_url(); ?>service/print_atp?invoice=<?= $service->service_invoice ?>');

                                    }, 1500);

                                } else {

                                    Swal.fire({

                                        icon: 'error',

                                        title: 'ผิดพลาด!',

                                        text: res.message,

                                        confirmButtonText: 'ตกลง'

                                    });

                                    return false;

                                }

                            }

                        })

                    }

                })

            }

        })

    });
</script>