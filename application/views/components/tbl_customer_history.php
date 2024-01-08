<table class="table table-bordered table-hover" id="tblCustomerHistory">

    <thead>

        <tr class="text-center">

            <th style="width: 15%">Job Order</th>

            <th style="width: 15%">Installation Date</th>

            <th style="width: 15%">Completed Date</th>

            <th style="width: 10%">Status</th>

            <th>Option</th>

        </tr>

    </thead>

    <tbody>

        <?php foreach($customer_history as $item):?>

            <tr>

                <th><?=$item->service_invoice;?></th>

                <td>

                    <?=date_format(date_create($item->due_date),'d/m/Y');?>

                </td>

                <td>

                    <?=date_format(date_create($item->end_date),'d/m/Y');?>

                </td>

                <td class="text-center">

                <?php

                        switch($item->service_status){

                            case 'created' :

                                echo '<span class="badge badge-primary">Created</span>';

                                break;

                            case 'wait':

                                echo '<span class="badge badge-danger">Wait</span>';

                                break;

                            case 'fixed':

                                echo '<span class="badge badge-warning">Inprogress</span>';

                                break;

                            case 'done':

                                echo '<span class="badge badge-success">Completed</span>';

                                break;

                            default :

                                echo '';

                        }

                    ?>

                </td>

                <td class="text-center">

                    <a href="<?=base_url();?>pages/service_detail/<?=$item->service_invoice;?>" class="btn btn-default btn-flat btn-sm mt-1"><i class="fas fa-list"></i> Details</a>

                    <a href="<?=base_url();?>service/print_receipt?invoice=<?=$item->service_invoice;?>" target="_blank" class="btn btn-default btn-flat btn-sm mt-1"><i class="fas fa-receipt"></i> Job Order</a>

                    <a href="<?=base_url();?>service/print_tax?invoice=<?=$item->service_invoice;?>" target="_blank" class="btn btn-default btn-flat btn-sm mt-1"><i class="fas fa-file-invoice"></i> ATP Report</a>

                </td>

            </tr>

        <?php endforeach;?>

    </tbody>

</table>

<script>

    $('#tblCustomerHistory').DataTable({

        "paging": true,

        "lengthChange": false,

        "searching": true,

        "ordering": false,

        "info": false,

        "autoWidth": false,

        "responsive": true,

        "pageLength": 25,

        language: {

            search: "Search :",

            searchPlaceholder: "",

            "lengthMenu": "แสดง _MENU_ รายการ/หน้า",

            "zeroRecords": "--ไม่มีข้อมูล--",

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
