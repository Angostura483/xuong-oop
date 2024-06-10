<?php

namespace Ductong\XuongOop\Controllers\Admin;

use Ductong\XuongOop\Commons\Controller;
use Ductong\XuongOop\Commons\Helper;
use Ductong\XuongOop\Models\Product;
use Ductong\XuongOop\Models\Category;
use Rakit\Validation\Validator;

class ProductController extends Controller
{
    private Product $product;
    private Category $category;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }

    public function index()
    {
        [$products, $totalPage] = $this->product->paginate($_GET['page'] ?? 1);
        $categories = $this->category->all();

        $this->renderViewAdmin('products.index', [
            'products' => $products,
            'totalPage' => $totalPage,
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $categories = $this->category->all();
        $this->renderViewAdmin('products.create', [
            'categories' => $categories
        ]);
    }

    public function store()
    {
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'          => 'required|max:100',
            'category_id'   => 'required|integer',
            'img' => 'uploaded_file:0,5M,png,jpg,jpeg',
            'price_regular' => 'required|numeric',
            'price_sale'    => 'numeric',
            'overview'      => 'required|max:255',
            'content'       => 'required',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('admin/products/create'));
            exit;
        } else {
            $data = [
                'name'          => $_POST['name'],
                'category_id'   => $_POST['category_id'],
                'price_regular' => $_POST['price_regular'],
                'price_sale'    => $_POST['price_sale'],
                'overview'      => $_POST['overview'],
                'content'       => $_POST['content'],
                'views'         => 0,
            ];
            
            if (isset($_FILES['img']) && $_FILES['img']['size'] > 0) {
                $from = $_FILES['img']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['img']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['img'] = $to;
                } else {
                    $_SESSION['errors']['img'] = 'Upload không thành công';

                    header('Location: ' . url('admin/products/create'));
                    exit;
                }
            }

            $this->product->insert($data);
            
            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location: ' . url('admin/products'));
            exit;
        }
    }

    public function show($id)
    {
        $product = $this->product->findByID($id);
        $categories = $this->category->all();

        $this->renderViewAdmin('products.show', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function edit($id)
    {
        $product = $this->product->findByID($id);
        $categories = $this->category->all();

        $this->renderViewAdmin('products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update($id)
    {
        $product = $this->product->findByID($id);

        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'          => 'required|max:100',
            'category_id'   => 'required|integer',
            'img'           => 'uploaded_file:0,5M,png,jpg,jpeg',
            'price_regular' => 'required|numeric',
            'price_sale'    => 'numeric',
            'overview'      => 'required|max:255',
            'content'       => 'required',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url("admin/products/{$product['id']}/edit"));
            exit;
        } else {
            $data = [
                'name'          => $_POST['name'],
                'category_id'   => $_POST['category_id'],
                'price_regular' => $_POST['price_regular'],
                'price_sale'    => $_POST['price_sale'],
                'overview'      => $_POST['overview'],
                'content'       => $_POST['content'],
            ];

            if (isset($_FILES['img']) && $_FILES['img']['size'] > 0) {

                $flagUpload = true;

                $from = $_FILES['img']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['img']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['img'] = $to;
                } else {
                    $_SESSION['errors']['img'] = 'Upload không thành công';

                    header('Location: ' . url("admin/products/{$product['id']}/edit"));
                    exit;
                }
            }

            $this->product->update($id, $data);

            if (
                $flagUpload
                && $product['img']
                && file_exists(PATH_ROOT . $product['img'])
            ) {
                unlink(PATH_ROOT . $product['img']);
            }

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location: ' . url('admin/products'));
            exit;
        }
    }

    public function delete($id)
    {
        $product = $this->product->findByID($id);

        $this->product->delete($id);

        if (
            $product['img']
            && file_exists(PATH_ROOT . $product['img'])
        ) {
            unlink(PATH_ROOT . $product['img']);
        }

        header('Location: ' . url('admin/products'));
        exit;
    }
}
