<?php

use common\utils\Y;

?>

<table id="demo" lay-filter="test"></table>

<script type="text/html" id="barDemo">
  <a class="layui-btn layui-btn-xs" lay-event="detail">查看</a>
  <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
  <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="delete">删除</a>
</script>
<script>
layui.use('table', function() {
    var table = layui.table;

    //第一个实例
    var tableObject = {
        id:'tableId',
        elem: '#demo',
        height: 500,
        url: '<?php echo Y::to(['member/manage/list']) ?>' //数据接口
            ,
        page: true //开启分页
            ,
        cols: [
            [ //表头
                {
                    field: 'id',
                    title: 'ID',
                    width: 80,
                    sort: true,
                    fixed: 'left'
                },
                {
                    field: 'username',
                    title: '用户名',
                    width: 200
                },
                {
                    field: 'created_at',
                    title: '创建时间',
                    width: 135,
                    sort: true
                },
                {
                    title: '操作',
                    toolbar: '#barDemo'
                }
            ]
        ]
    };
    table.render(tableObject);
    table.on('tool(test)',function(obj){
        if(obj.event == 'edit'){
            layer.open({
                type : 2,
                title:'编辑',
                content: '<?php echo Y::to(['member/manage/index']) ?>'
            });
        }else if(obj.event == 'delete'){
            layer.confirm('真的删除该行么？',function(index){
                obj.del();
                layer.close(index);
                $.ajax({
                    url: "<?php echo Y::to(['member/manage/delete']) ?>?id=" + obj.data.id,
                    success:function(res){
                        if(0 == res.code){
                            layer.alert('删除成功');
                        }
                        table.reload('tableId', tableObject)
                    }
                });
            });
        }
    });

});
</script>