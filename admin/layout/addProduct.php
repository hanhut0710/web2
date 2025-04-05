<style>
    .form-container {
      max-width: 800px;
      margin: 50px auto;
      padding: 30px;
      background-color: #fff;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 30px;
      font-size: 28px;
      color: #333;
    }

    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px 30px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
    }

    .form-group label {
      margin-bottom: 6px;
      font-weight: 600;
      color: #444;
    }

    .form-group input,
    .form-group select {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 15px;
      transition: 0.3s;
    }

    .form-group input:focus,
    .form-group select:focus {
      border-color: #007bff;
      outline: none;
    }

    .full-width {
      grid-column: 1 / 3;
    }

    .submit-btn {
      margin-top: 20px;
      grid-column: 1 / 3;
    }

    button[type="submit"] {
      width: 100%;
      padding: 12px;
      font-size: 16px;
      background-color: #fdb927;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
    }

    button[type="submit"]:hover {
      background-color: #fdb927;
    }

    @media (max-width: 768px) {
      .form-grid {
        grid-template-columns: 1fr;
      }

      .full-width {
        grid-column: 1 / 2;
      }

      .submit-btn {
        grid-column: 1 / 2;
      }
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Thêm Sản Phẩm Mới</h2>
    <form action="processAddProduct.php" method="POST" enctype="multipart/form-data">
      <div class="form-grid">
        <div class="form-group">
          <label for="id">ID Sản Phẩm</label>
          <input type="text" id="id" name="id" required>
        </div>

        <div class="form-group">
          <label for="name">Tên Sản Phẩm</label>
          <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
          <label for="price">Giá</label>
          <input type="number" id="price" name="price" step="0.01" required>
        </div>

        <div class="form-group">
          <label for="stock">Tồn Kho</label>
          <input type="number" id="stock" name="stock" required>
        </div>

        <div class="form-group">
          <label for="color">Màu Sắc</label>
          <input type="text" id="color" name="color" required>
        </div>

        <div class="form-group">
          <label for="size">Kích Cỡ</label>
          <input type="text" id="size" name="size" required>
        </div>

        <div class="form-group">
          <label for="brand">Thương Hiệu</label>
          <input type="text" id="brand" name="brand" required>
        </div>

        <div class="form-group">
          <label for="category">Thể Loại</label>
          <select id="category" name="category" required>
            <option value="">-- Chọn thể loại --</option>
            <option value="sneakers">Sneakers</option>
            <option value="boots">Boots</option>
            <option value="sandals">Sandals</option>
            <option value="slippers">Slippers</option>
          </select>
        </div>

        <div class="form-group full-width">
          <label for="img">Ảnh Sản Phẩm</label>
          <input type="file" id="img" name="img" accept="image/*" required>
        </div>

        <div class="form-group submit-btn">
          <button type="submit">Thêm Sản Phẩm</button>
        </div>
      </div>
    </form>
  </div>