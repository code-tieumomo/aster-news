<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Quanph\SimpleRake\SimpleRake;

class TestController extends Controller
{
    public function index()
    {
        $text = 'Bộ Y tế vừa cho biết mạng xã hội xuất hiện một số clip có hình ảnh nhân vật tự xưng là nhân viên y tế bệnh viện lớn, lương y, tư vấn bệnh, quảng cáo thực phẩm bảo vệ sức khỏe là thuốc chữa bệnh để bán sản phẩm.

Khoản 2 Điều 27 Nghị định 15 năm 2018 của Chính phủ hướng dẫn chi tiết thi hành một số điều của Luật An toàn thực phẩm, quy định: “Không sử dụng hình ảnh, thiết bị, trang phục, tên, thư tín của các đơn vị, cơ sở y tế, bác sĩ, dược sĩ, nhân viên y tế, thư cảm ơn của người bệnh, bài viết của bác sĩ, dược sĩ, nhân viên y tế để quảng cáo thực phẩm”.

Theo Cục An toàn thực phẩm (Bộ Y tế), bất kỳ bác sĩ, lương y, nhân viên y tế nào tham gia quảng cáo sản phẩm thực phẩm bảo vệ sức khỏe là vi phạm quy định của pháp luật hiện hành.

"Người tiêu dùng cần cảnh giác với các clip giới thiệu là bác sĩ, lương y, tư vấn bệnh, tư vấn dùng sản phẩm chữa bệnh", Cục An toàn thực phẩm đưa ra cảnh báo. Đồng thời, người dân cũng cần cảnh giác với các clip giới thiệu từng là bệnh nhân, dùng sản phẩm thực phẩm chức năng, thực phẩm bảo vệ sức khỏe có thể khỏi bệnh.

Theo cơ quan chuyên môn của Bộ Y tế, việc tin theo các nội dung quảng cáo sai sự thật khiến người bệnh không đến ngay các cơ sở y tế để được khám, chữa bệnh kịp thời, sẽ bỏ qua giai đoạn điều trị khỏi bệnh, tổn thất về kinh tế, tổn hại sức khỏe.

Gần đây, các bệnh viện, bác sĩ liên tục bị kẻ xấu giả mạo tên để bán thực phẩm chức năng. Ngày 18/5, đại diện Bệnh viện Trung ương Quân đội 108 (Hà Nội) cho biết trên các nền tảng mạng xã hội xuất hiện video nhân vật tự xưng là bác sĩ giới thiệu sách Minh triết trong ăn uống của người phương Đông "có thể chữa bệnh".

Video này được chia sẻ lại ở một số trang Facebook cá nhân có hơn 200.000 người theo dõi, tạo niềm tin rằng "bác sĩ Quân y 108" khẳng định "liệu pháp chữa lành tự nhiên" là "chữa tất cả", sau đó dẫn dắt mua thực phẩm chức năng.';
        $sp = new SimpleRake($text, 'vi');
        dd($sp->extractKeywords());
    }
}
