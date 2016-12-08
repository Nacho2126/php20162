<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // add "createPost" permission
        //$createPost = $auth->createPermission('createPost');
        //$createPost->description = 'Create a post';
        //$auth->add($createPost);

        // add "updatePost" permission
        //$updatePost = $auth->createPermission('updatePost');
        //$updatePost->description = 'Update post';
        //$auth->add($updatePost);

        // add "author" role and give this role the "createPost" permission
<<<<<<< HEAD
        $author = $auth->createRole('Gestion');
        $auth->add($author);
        $auth->addChild($author, $createPost);
=======
        $manage = $auth->createRole('manage');
        $auth->add($manage);
        //$auth->addChild($manage, $createPost);

        $user = $auth->createRole('user');
        $auth->add($user);
>>>>>>> 448b1d9a178b1b67d9e82aa6f4349b54a3d31349

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        //$auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $manage);
        $auth->addChild($admin, $user);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        //$auth->assign($author, 2);
        $auth->assign($admin, 1);
    }
}
