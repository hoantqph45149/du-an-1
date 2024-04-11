<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2" style="padding: 0;">
            <nav id="sidebar" class="bg-dark sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?act=home"><i class="fas fa-home"></i> Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?act=tongquan"><i class="fas fa-list"></i> Tổng quan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-vector-square"></i> Danh mục</a>
                            <ul class="submenu" id="productsMenu">
                                <li><a href="index.php?act=dsdanhmuc">Danh sách danh mục</a></li>
                                <li><a href="index.php?act=tmdanhmuc">Thêm danh mục</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fab fa-product-hunt"></i> Sản phẩm</a>
                            <ul class="submenu" id="productsMenu">
                                <li><a href="index.php?act=dssp">Danh sách sản phẩm</a></li>
                                <li><a href="index.php?act=dstsp">Thêm sản phẩm</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=dskh"><i class="fas fa-user"></i> khách hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="productsDropdown"><i class="fas fa-user"></i> Thành viên</a>
                            <ul class="submenu" id="productsMenu">
                                <li><a href="index.php?act=dstv">Danh sách Thành viên</a></li>
                                <li><a href="index.php?act=dsttv">Thêm thành viên</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=binhluan"><i class="fas fa-comments"></i> Bình luận</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=donhang"><i class="fas fa-shopping-bag"></i> Đơn hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-newspaper"></i> Tin Tức</a>
                            <ul class="submenu" id="productsMenu">
                                <li><a href="index.php?act=dstintuc">Danh sách tin tức</a></li>
                                <li><a href="index.php?act=tintuc">Thêm tin tức</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?act=lienhe"><i class="fas fa-id-card-alt"></i> Liên hệ</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
            <div class="product-status-wrap">
                <h4>Danh sách đơn hàng</h4>
                <table>
                    <tr>
                        <th>Mã đơn đặt hàng</th>
                        <th>Khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Ngày đặt</th>
                        <th>Ngày giao</th>
                        <th>Nơi giao</th>
                        <th>Ghi chú</th>
                        <th>Hình thức thanh toán</th>
                        <th>Tổng thành tiền</th>
                        <th>Trạng thái </th>
                        <th>Tình trạng</th>
                        <th>Cài đặt</th>
                    </tr>
                    <?php
                    foreach ($listbill as $bill) {
                        extract($bill);
                        $suabill = "index.php?act=suabill&id=" . $id;
                        $xoabill = "index.php?act=xoabill&id=" . $id;
                        $xemctdh = "index.php?act=xemctdh&id=" . $id;
                        $kh = $bill['fullname'];
                        $ttdh = get_ttdh($bill['status']);
                        $pttt = pttt($bill['pttt']);
                    ?>
                        <tr>
                            <td><strong>MDH<?= $bill['id'] ?></strong></td>
                            <td><?= $kh ?></td>
                            <td><?= $bill['phone_number'] ?></td>
                            <td><?= $bill['order_date'] ?></td>
                            <td><?= $bill['delivery_date'] ?></td>
                            <td><?= $bill['address'] ?></td>
                            <td><?= $bill['note'] ?></td>
                            <td>
                                <button class="ps-setting"><?= $pttt ?></button>
                            </td>
                            <td><?= number_format($bill['total_money']) ?></td>
                            <td>
                                <select style="width: 150px;" name="select_option" id="select_option" onchange="handleChange(this)">
                                    <?php
                                    if ($huydon == 0) {
                                        echo '
                                        <option value="" href="">' . $ttdh . '</option>
                                        <option value="0" href="index.php?act=ttdonhang&id=' . $bill['id'] . '&ttdh=0">' . get_ttdh(0) . '</option>
                                        <option value="1" href="index.php?act=ttdonhang&id=' . $bill['id'] . '&ttdh=1">' . get_ttdh(1) . '</option>
                                        <option value="2" href="index.php?act=ttdonhang&id=' . $bill['id'] . '&ttdh=2">' . get_ttdh(2) . '</option>
                                        <option value="3" href="index.php?act=ttdonhang&id=' . $bill['id'] . '&ttdh=3">' . get_ttdh(3) . '</option>
                                        ';
                                    }elseif($huydon == 1){
                                        echo '<option value="" href="">' . $ttdh . '</option>';
                                    } else {
                                        echo '<option value="" href="">' . $ttdh . '</option>';
                                    }
                                    ?>

                                </select>

                                <script>
                                    function handleChange(select) {
                                        var selectedOption = select.options[select.selectedIndex];
                                        var href = selectedOption.getAttribute('href');
                                        if (href) {
                                            window.location.href = href;
                                        }
                                    }
                                </script>
                            </td>
                            <td>
                                <?php
                                if ($huydon == 0) {
                                    echo '';
                                } elseif ($huydon == 1) {
                                    echo '
                                    <button class="pd-setting">
                                    <a href="index.php?act=huydon&id=' . $bill['id'] . '&huydon=2">Xác nhận hủy</a>
                                    </button>
                                        ';
                                } else {
                                    echo '<p>Đã hủy</p>';
                                }
                                ?>
                            </td>
                            <td>
                                <a href="<?= $suabill ?>">
                                    <button title="Sửa" class="pd-setting-ed"><i class="fas fa-tools"></i></button>
                                </a><br>
                                <a href="<?= $xoabill ?>">
                                    <button title="Xóa" class="pd-setting-ed"><i class="fas fa-trash-alt"></i></button>
                                </a><br>
                                <a href="<?= $xemctdh ?>">
                                    <button title="Chi tiết đơn hàng" class="pd-setting-ed"><i class="fas fa-eye"></i></button>
                                </a>
                            </td>
                        </tr>
                    <?php  }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>