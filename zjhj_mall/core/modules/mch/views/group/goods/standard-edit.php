<?php
defined('YII_RUN') or exit('Access Denied');
$urlManager = Yii::$app->urlManager;
$this->title = '阶级团编辑';
$staticBaseUrl = Yii::$app->request->baseUrl . '/statics';
$this->params['active_nav_group'] = 10;
$this->params['is_group'] = 1;


if($_GET['goods_id']){
    $returnUrl = $urlManager->createUrl(['mch/group/goods/standard', 'goods_id' => $_GET['goods_id']]);
}else{
    $returnUrl = $urlManager->createUrl(['mch/group/goods/standard', 'goods_id' => $goods['goods_id']]);
}
?>
<style> 
    .cat-box { 
        border: 1px solid rgba(0, 0, 0, .15);
    }

    .cat-box .row {
        margin: 0;
        padding: 0;
    }

    .cat-box .col-6 {
        padding: 0;
    }

    .cat-box .cat-list {
        border-right: 1px solid rgba(0, 0, 0, .15);
        overflow-x: hidden;
        overflow-y: auto;
        height: 10rem;
    }

    .cat-box .cat-item {
        border-bottom: 1px solid rgba(0, 0, 0, .1);
        padding: .5rem 1rem;
        display: block;
        margin: 0;
    }

    .cat-box .cat-item:last-child {
        border-bottom: none;
    }

    .cat-box .cat-item:hover {
        background: rgba(0, 0, 0, .05);
    }

    .cat-box .cat-item.active {
        background: rgb(2, 117, 216);
        color: #fff;
    }

    .cat-box .cat-item input {
        display: none;
    }

    form {
    }

    form .head {
        position: fixed;
        top: 50px;
        right: 1rem;
        left: calc(240px + 1rem);
        z-index: 9;
        padding-top: 1rem;
        background: #f5f7f9;
        padding-bottom: 1rem;
    }

    form .head .head-content {
        background: #fff;
        border: 1px solid #eee;
        height: 40px;
    }

    .head-step {
        height: 100%;
        padding: 0 20px;
    }

    .step-block {
        position: relative;
    }

    form .body {
        padding-top: 45px;
    }

    .step-block > div {
        padding: 20px;
        background: #fff;
        border: 1px solid #eee;
        margin-bottom: 5px;
    }

    .step-block > div:first-child {
        padding: 20px;
        width: 120px;
        margin-right: 5px;
        font-weight: bold;
        text-align: center;
    }

    .step-block .step-location {
        position: absolute;
        top: -122px;
        left: 0;
    }

    .step-block:first-child .step-location {
        top: -140px;
    }

    form .foot {
        text-align: center;
        background: #fff;
        border: 1px solid #eee;
        padding: 1rem;
    }

    .edui-editor,
    #edui1_toolbarbox {
        z-index: 2 !important;
    }

    form .short-row {
        width: 380px;
    }

    .form {
        background: none;
        width: 100%;
        max-width: 100%;
    }

    .attr-group {
        border: 1px solid #eee;
        padding: .5rem .75rem;
        margin-bottom: .5rem;
        border-radius: .15rem;
    }

    .attr-group-delete {
        display: inline-block;
        background: #eee;
        color: #fff;
        width: 1rem;
        height: 1rem;
        text-align: center;
        line-height: 1rem;
        border-radius: 999px;
    }

    .attr-group-delete:hover {
        background: #ff4544;
        color: #fff;
        text-decoration: none;
    }

    .attr-list > div {
        vertical-align: top;
    }

    .attr-item {
        display: inline-block;
        background: #eee;
        margin-right: 1rem;
        margin-top: .5rem;
        overflow: hidden;
    }

    .attr-item .attr-name {
        padding: .15rem .75rem;
        display: inline-block;
    }

    .attr-item .attr-delete {
        padding: .35rem .75rem;
        background: #d4cece;
        color: #fff;
        font-size: 1rem;
        font-weight: bold;
    }

    .attr-item .attr-delete:hover { 
        text-decoration: none;
        color: #fff;
        background: #ff4544;
    }

    form .form-group .col-3 {
        -webkit-box-flex: 0;
        -webkit-flex: 0 0 160px;
        -ms-flex: 0 0 160px;
        flex: 0 0 160px;
        max-width: 160px;
        width: 160px;
    }
</style>
<div class="panel mb-3">
    <div class="panel-header"><?= $this->title ?></div>
    <div class="panel-body">
        <form class="form auto-form" method="post" autocomplete="off" return="<?= $returnUrl ?>">
            <div class="step-block" flex="dir:left box:first">
                <div>
                    <span>基本信息</span>
                    <span class="step-location"></span>
                </div>
                <div>
                    <div class="form-group row">
                        <div class="col-3 text-right">
                            <label class="col-form-label">商品名称</label>
                        </div>
                        <div class="col-5">
                            <div class="text-left ellipsis"><?= $goods['name'] ?></div>
                            <input type="hidden" name="goods_id" value="<?= $_GET['goods_id'] ?>" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-3 text-right">
                            <label class="col-form-label required">团长优惠</label>
                        </div>
                        <div class="col-9">
                            <input type="number" step="0.01" class="form-control short-row"
                                   name="colonel" min="0"
                                   value="<?= $goods['colonel'] ? $goods['colonel'] : 1 ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-3 text-right">
                            <label class="col-form-label required">拼团人数</label>
                        </div>
                        <div class="col-9">
                            <input type="number" step="1" class="form-control short-row"
                                   name="group_num" min="2"
                                   value="<?= $goods['group_num'] ? $goods['group_num'] : 2 ?>">
                            <div class="fs-sm text-muted">拼团人数必须大于等于2人</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-3 text-right">
                            <label class=" col-form-label required">拼团时间 </label>
                        </div>
                        <div class="col-9">
                            <div class="input-group short-row">
                                <input type="number" step="1" class="form-control"
                                       name="group_time" min="1"
                                       value="<?= $goods['group_time'] ? $goods['group_time'] : 1 ?>">
                                <span class="input-group-addon">时</span>
                                <div class="fs-sm text-muted"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="step-block" flex="dir:left box:first">
                <div>
                    <span>规格库存</span>
                    <span class="step-location" id="step3"></span>
                </div>
                    <!-- 有规格 -->
                    <div class="attr-edit-block">
                    <div class="form-group row">
                        <div class="col-3 text-right">
                            <label class=" col-form-label required">价格和库存</label>
                        </div>
                        <div class="col-9">
                        <table class="table table-bordered attr-table">
                            <thead>
                            <tr>
                                <th><span><input type="checkbox" class="goods-all"></span></th>
                            <?php foreach($td as $v): ?>
                                <th>
                            <?= $v['attr_group_name'] ?>
                                </th>
                            <?php endforeach ;?>
                                <th>库存</th>
                                <th>团购价格</th>
                                <th>单买价格</th>
                                <th>货号</th>
                            </tr>
                            </thead>
                            <?php foreach($goods_attr as $k=>$vv): ?>
                            <tr>
                                <td class="nowrap" style="text-align: left">
                                    <span>
                                        <input type="checkbox" class="goods-one" value="<?= $k ?>">
                                    </td>
                                <?php foreach($td as $v): ?>
                                <td>
                                    <?php foreach($vv['attr_list'] as $vvv): ?>
                                    <?= in_array($vvv['attr_id'],$v['ids'])?$vvv['attr_name']:'' ?>
                                    <?php endforeach; ?>
                                </td>
                                <?php endforeach ;?>
                                <td>
                                    <div><?= $vv['num'] ?></div>
                                </td>
                                <td>
                                    <input id="attr<?= $k ?>" class="form-control form-control-sm" name="attr[<?= $k ?>][price]" value="<?= $_GET['goods_id']?0:$vv['price'] ?>" max="999999999" type="number" min="0" step="0.01" style="width: 100px">
                                </td>
                                <td>
                                    <div><?= $vv['single'] ?></div>
                                </td>
                                <td>
                                    <div><?= $vv['no'] ?></div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </table>
                        <div class="text-muted fs-sm">价格0表示保持原售价</div>
                      </div> 
                    </div>
                </div>
            </div>

            <div flex="dir:left box:first">
                <div class="form-group row">
                    <div class="col-3"></div>
                    <div class="col-3">
                        <a class="btn btn-primary auto-form-btn" href="javascript:">保存</a>
                        <a class="" data-toggle="modal" data-target="#myModal">批量设置</a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" data-backdrop="static" id="myModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">设置价格</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <span style="margin-left:30px">金额 :  
                            <input id="batchm" name="batch-num" type="number" min="0" step="0.01" max="999999999" style="width:50%">
                        </span>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                            <button type="button" class="btn btn-primary alert-confirm-btn">提交</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $(document).on('click', '.goods-all', function () {
        var checked = $(this).prop('checked');
        $('.goods-one').prop('checked', checked);
        if (checked) {
            $('.batch').addClass('is_use');
        } else {
            $('.batch').removeClass('is_use');
        }
    });
    $(document).on('click', '.goods-one', function () {
        var checked = $(this).prop('checked');
        var all = $('.goods-one');
        var is_all = true;//只要有一个没选中，全选按钮就不选中
        var is_use = false;//只要有一个选中，批量按妞就可以使用
        all.each(function (i) {
            if ($(all[i]).prop('checked')) {
                is_use = true;
            } else {
                is_all = false;
            }
        });
        if (is_all) {
            $('.goods-all').prop('checked', true);
        } else {
            $('.goods-all').prop('checked', false);
        }
        if (is_use) {
            $('.batch').addClass('is_use');
        } else {
            $('.batch').removeClass('is_use');
        }
    });
    // $(document).on('click', '.batch', function () {
    //     var all = $('.goods-one');
    //     var is_all = true;//只要有一个没选中，全选按钮就不选中
    //     all.each(function (i) {
    //         if ($(all[i]).prop('checked')) {
    //             is_all = false;
    //         }
    //     });
    //     if (is_all) {
    //         $.myAlert({
    //             content: "请先勾选商品"
    //         });
    //     }
    // });
    $(document).on('click','.alert-confirm-btn',function(){
        $("#myModal").modal("hide");
        var all = $('.goods-one');
        all.each(function (i) {
            if ($(all[i]).prop('checked')) {
                var psel = document.getElementById('attr'+$(all[i]).prop('value'));
                psel.value =$("#batchm").val();
            }        
        });
    });
    $(document).on('click', '.is_use', function () {
        var a = $(this);
        var goods_group = [];
        var all = $('.goods-one');
        all.each(function (i) {
            if ($(all[i]).prop('checked')) {
                var goods = {};
                goods.id = $(all[i]).val();
                goods.num = $(all[i]).data('num');
                goods_group.push(goods);
            }
        });
        $.myConfirm({
            content: a.data('content'),
            confirm: function () {
                $.myLoading();
                $.ajax({
                    url: a.data('url'),
                    type: 'get',
                    dataType: 'json',
                    data: {
                        goods_group: goods_group,
                        type: a.data('type'),
                    },
                    success: function (res) {
                        if (res.code == 0) {
                            window.location.reload();
                        } else {

                        }
                    },
                    complete: function () {
                        $.myLoadingHide();
                    }
                });
            }
        })
    });
</script>