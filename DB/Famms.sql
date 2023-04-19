
--
-- Cơ sở dữ liệu: shop_ban_hang
--

--------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `id_staff` INT PRIMARY KEY AUTO_INCREMENT,
  `user_name` varchar(255),
  `email` varchar(255),
  `password` varchar(255),
  `phone_number` varchar(10),
  `full_name` varchar(255)
);

--
-- Cấu trúc bảng cho bảng `costumer`
--

CREATE TABLE 'costumer' (
  `id_customer` INT PRIMARY KEY AUTO_INCREMENT,
  `user_name` varchar(255),
  `email` varchar(255),
  `password` varchar(255),
  `phone_number` varchar(10),
  `full_name` varchar(255),
  'feedback' varchar(255)
);

--
-- Cấu trúc bảng cho bảng `order`
--
CREATE TABLE 'order' (
    'id' INT PRIMARY KEY AUTO_INCREMENT,
    'status' varchar(255),
    'purchase_date' DATETIME
);

--
-- Cấu trúc bảng cho bảng `category`
--
CREATE TABLE 'category' (
  'id_category' INT PRIMARY KEY AUTO_INCREMENT,
  'Category_name' varchar(255),
);

--
-- Cấu trúc bảng cho bảng `color`
--
CREATE TABLE 'color' (
  'id_color' INT PRIMARY KEY AUTO_INCREMENT,
  'color_name' varchar(255),
);

--
-- Cấu trúc bảng cho bảng `delivery_method`
--
CREATE TABLE 'delivery_method' (
  'id_delivery' INT PRIMARY KEY AUTO_INCREMENT
  'method_name' VARCHAR(255) NOT NULL,
);

--
-- Cấu trúc bảng cho bảng `payment_method`
--
CREATE TABLE 'payment_method' (
  'ID_payment' INT PRIMARY KEY AUTO_INCREMENT,
  'Method_name' varchar(255) NOT NULL,

--
-- Cấu trúc bảng cho bảng `order_detail`
--
CREATE TABLE 'order_detail' (
  'Quantity	' INT(),
  'Save_price_order' INT(),
);


--
-- Cấu trúc bảng cho bảng `size`
--
CREATE TABLE 'size' (
  'ID_size' INT PRIMARY KEY AUTO_INCREMENT,
  'Size_name' varchar(255) NOT NULL,
);

--
-- Cấu trúc bảng cho bảng `product`
--
CREATE TABLE 'product' (
  'ID_product' INT PRIMARY KEY AUTO_INCREMENT,
  'Product_name' varchar(255) NOT NULL,
  'img' text(),
  'Price' INT(),
);

--
-- Cấu trúc bảng cho bảng `product_detail`
--
CREATE TABLE 'product_detail' (
  'ID_product_detail' INT PRIMARY KEY AUTO_INCREMENT,
  'Quantity' INT();
  'Description' VARCHAR(255);
);