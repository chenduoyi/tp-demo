<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" action="/Admin/Node" method="post">
    <input type="hidden" name="pageNum" value="1"/>
    <input type="hidden" name="_order" value="<?php echo ($_REQUEST["_order"]); ?>"/>
    <input type="hidden" name="_sort" value="<?php echo ($_REQUEST["_sort"]); ?>"/>
</form>

<div class="pageHeader">
    <form onsubmit="return navTabSearch(this);" action="/Admin/Node" method="post">
        <div class="searchBar">
            <ul class="searchContent">
                <li>
                    <label>名称：</label>
                    <input type="text" name="name" class="medium">
                </li>
            </ul>
            <div class="subBar">
                <ul>
                    <li>
                        <div class="buttonActive">
                            <div class="buttonContent">
                                <button type="submit">查询</button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </form>
</div>

<div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="add" href="/Admin/Node/add" target="dialog" mask="true"><span>新增</span></a></li>
            <li><a class="delete" href="/Admin/Node/delete/id/{sid_node}" target="ajaxTodo"
                   title="你确定要删除吗？" warn="请选择节点"><span>删除</span></a></li>
            <li><a class="edit" href="/Admin/Node/add/id/{sid_node}" target="dialog" mask="true"
                   warn="请选择节点"><span>修改</span></a></li>
        </ul>
    </div>


    <table class="table" width="100%" align="center" layoutH="138">
        <thead>
        <tr>
            <th width="80" align="center">编号</th>
            <th width="auto" align="center">节点路径</th>
            <th width="auto" align="center">节点名称</th>
            <th width="auto" align="center">排序</th>
            <th width="auto" align="center">状态</th>
            <th width="auto" align="center">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid_node" rel="<?php echo ($vo['id']); ?>">
                <td><?php echo ($vo['id']); ?></td>
                <td><a href="/Admin/Node/index/pid/<?php echo ($vo['id']); ?>/" target="navTab" rel="node<?php echo ($vo['id']); ?>"><?php echo ($vo['name']); ?></a></td>
                <td><?php echo ($vo['title']); ?></td>
                <td><?php echo ($vo['sort']); ?></td>
                <td><?php echo (getStatus($vo['status'])); ?></td>
                <td>
                    <a target="ajaxTodo" style="color:blue" href="<?php echo U('resume',array('id'=>$vo['id']));?>">启用</a>&nbsp;
                    <a target="ajaxTodo" style="color:blue" href="<?php echo U('forbid',array('id'=>$vo['id']));?>">禁用</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>

    <div class="panelBar">
        <div class="pages">
            <span>共<?php echo ($totalCount); ?>条</span>
        </div>
        <div class="pagination" targetType="navTab" totalCount="<?php echo ($totalCount); ?>" numPerPage="<?php echo ($numPerPage); ?>"
             pageNumShown="10" currentPage="<?php echo ($currentPage); ?>"></div>
    </div>
</div>