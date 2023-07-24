<template>
    <div class="popup-overlay">
      <div class="popup">
        <div class="d-flex justify-content-between align-items-center">

            <h2>Order Products</h2>
            <button @click="closePopup">Close</button>
        </div>
        <table>
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Price</th>
            </tr>
          </thead>

          <tbody>

            <tr v-for="product in orderProducts.order_products" :key="product.id">
              <td>{{ product.product.name }}</td>
              <td>{{ product.quantity }}</td>
              <td>{{ product.product.price }}</td>
            </tr>

            <tr>
              <td  >Total:</td>
              <td>{{ orderProducts.total_quantity }}</td>

              <td>{{ orderProducts.total_amount }}</td>
            </tr>

          </tbody>

        </table>

      </div>
    </div>
  </template>

  <script>
  export default {
    props: {
      orderProducts: {
        type: Array,
        required: true,
      },
    },
    methods: {
      closePopup() {
        this.$emit('close');
      },
    },
  };
  </script>

  <style scoped>

.popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 999999;
    overflow: auto;
}

/* Popup content styles */
.popup {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  width: 90%;
}

/* Table styles */
table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 15px;
}

thead {
  background-color: #f2f2f2;
}

th, td {
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #ccc;
}

tr:hover {
  background-color: #f9f9f9;
}

/* Close button style */
button {
  margin-top: 15px;
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.2s ease;
}

button:hover {
  background-color: #0056b3;
}

button:focus {
  outline: none;
}

/* Popup heading style */
h2 {
  font-size: 20px;
  margin-bottom: 10px;
}

/* Responsive styles */
@media (max-width: 768px) {
  .popup {
    width: 90%;
  }
}
  </style>
