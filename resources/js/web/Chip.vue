<template>
  <div class="col-md-8 col-lg-7 col-xl-6 order-2 order-lg-1">
    <h1 class="heading-custom text-13 ls-0 line-height-2 custom-ws-nowrap mb-5 z-index-1 position-relative">
      <span class="d-block position-relative">
        <span class="z-index-1 position-relative pr-4">
          <span
            class="d-inline-block appear-animation"
            data-appear-animation="fadeInLeftShorter"
            data-appear-animation-delay="1000"
          >Zynga Poker Chip</span>
        </span>
        
      </span>
      <strong
        class="font-weight-semibold text-3 d-inline-block appear-animation"
        data-appear-animation="fadeInLeftShorter"
        data-appear-animation-delay="1200"
      >7/24 Hızlı Sipariş Ver</strong>
    </h1>
    <div
      class="custom-heading-input d-flex align-items-center appear-animation"
      data-appear-animation="fadeInLeftShorter"
      data-appear-animation-delay="1400"
    >
      <span class="text-color-primary font-weight-bold text-11 mr-4">
        <input
          type="text"
          id="amount"
          v-on:input="getPrice"
          class="form-control form-control-lg"
          placeholder="Tutar girin..."
          min="1"
        >
      </span>

      <button v-on:click="addToCart" :disabled="!price > 0" class="btn btn-primary text-nowrap btn-rounded font-weight-semibold text-4 px-4 py-3">SATIN AL!</button>

    </div>
    <hr class="dashed tall">
    <div class="d-flex justify-content-between">
      <h1 class="custom-chip text-6 custom-ws-nowrap mb-0">Hesabınıza Geçecek Chip</h1>
      <h1 class="custom-chip text-6 custom-ws-nowrap mb-0">
        <img v-if="product" :src="product.category.photo" width="22" style="margin-bottom:8px"> 
        {{ (price > 0) ? amount / price : 0 | numeral(0, 0)}}
      </h1>
    </div>
    <div class="d-flex justify-content-between">
      <h1 class="custom-chip text-6 custom-ws-nowrap mb-0">Oyundaki Karşılığı</h1>
      <h1 class="custom-chip text-6 custom-ws-nowrap mb-0">$ {{ (price > 0) ? amount / price * 1000000 : 0 | numeral(0, 0) }}</h1>
    </div>
  </div>
</template>

<script>
import vueNumeralFilterInstaller from "vue-numeral-filter";

import AutoNumeric from "AutoNumeric";

Vue.use(vueNumeralFilterInstaller, { locale: "tr" });

export default {
  data() {
    return {
      amount: Number,
      price: 0,
      chip: 0,
      products: [],
      product: null
    };
  },

  mounted() {
    this.getProducts();

    new AutoNumeric('#amount', AutoNumeric.getPredefinedOptions().Turkish);

  },

  methods: {
    getProducts() {
      axios.post("/api/products").then(response => {
        this.products = response.data;
      });
    },

    getPrice() {
        this.amount = AutoNumeric.getNumber('#amount');

        let minPrice = Math.max(...[this.amount, this.getMinPrice()])

        if (this.amount < minPrice) {
            this.price = 0;
            return;
        }

        let self = this;
        
        let products = this.products.filter(function(product) {
          return product.price <= self.amount;
        });

        this.product = products[products.length - 1];

        this.price = parseFloat(this.product.price) / parseFloat(this.product.qty);

        this.chip = (this.price > 0) ? Math.round(this.amount / this.price) : 0;
        
    },

    getMinPrice(){
        let prices = this.products.map(function(product) {
          return product.price;
        });

        return Math.min(...prices);
    },

    addToCart() {
      window.location.href = `/add/${this.product.category_id}/${this.amount}`;
    }
  }
};
</script>


<style>
.table th {
  font-size: 80%;
  padding: 10px 20px;
}

.table td {
  font-size: 80%;
  padding: 0 20px;
}
</style>
