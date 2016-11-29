<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
/* @var $this yii\web\View */

$this->title = 'User List';
?>  
    
    <div class="col-md-10">
	<div class="content-box-large">
	    <div class="panel-heading">
                <div class="panel-title">User List</div>
                <div class="panel-title"><a style="color: #428bca;text-decoration: none;" href="<?php echo 'add-user'?>">Add New User</a></div>
	    </div>
            <div style="display:block;clear:both;">
                <?php
                    echo Yii::$app->view->render('@app/views/site/_search',['model' => $search,'searchstring' => $searchstring ]);
                ?>
            </div>
  	    <div class="panel-body">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                    <thead>
                        <tr>
                            <th><?=$sortlinks->link('email')?></th>
                            <th><?=$sortlinks->link('first_name')?></th>
                            <th><?=$sortlinks->link('last_name')?></th>
                            <th><?=$sortlinks->link('gender')?></th>
                            <th><?=$sortlinks->link('user_type')?></th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
		    </thead>
		    <tbody>
                        <?php
                            $bool = 0;
                            
                            if(!empty($userlist)) {
                                $bool = 1;
                                $i=0;
                                foreach($userlist as $data) {
                                    $urledit = yii\helpers\Url::toRoute(['admin-user/edit-user', 'id' => $data['id']]);    
                                    $urldelete = yii\helpers\Url::toRoute(['admin-user/delete-user', 'id' => $data['id']]);
                        ?>
                        <tr class="<?php echo ($i%2 == 0) ? 'odd' : '';?> gradeX">
                            <td><?php echo (!empty($data['email']) ? $data['email'] : 'N/A');?></td>
                            <td><?php echo (!empty($data['first_name']) ? $data['first_name'] : 'N/A');?></td>
                            <td><?php echo (!empty($data['last_name']) ? $data['last_name'] : 'N/A');?></td>
                            <td><?php echo (!empty($data['gender']) ? $data['gender'] : 'N/A');?></td>
                            <td><?php echo (!empty($data['user_type']) ? $data['user_type'] : 'N/A');?></td>
                            <td><?php echo ($data['status'] == 10 ? 'Active' : 'Inactive') ;?></td>
                            <td class="center"><a href="<?php echo $urledit;?>">Edit</a>&nbsp;&nbsp;<a href="<?php echo $urldelete;?>">Delete</a></td>
                        </tr>
                        <?php
                                $i++;                        
                                }
                            } 
                        ?>
			</tbody>
	  	    </table>
                    <?php
                        echo \yii\widgets\LinkPager::widget([
                            'pagination'=>$pagination,
                        ]);
                    ?>
                    <?php
                        if($bool == 0) {
                    ?>
                    <div>
                        <h4><b>No Record Found!</b></h4>
                    </div>
                    <?php
                        }
                    ?>
  		</div>
  	</div>
    </div>
		