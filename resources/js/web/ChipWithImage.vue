<template>
  <div class="col-md-8 col-lg-7 col-xl-6 order-2 order-lg-1">
    <div class="row d-flex align-items-center dollar-img">
      <div class="col-sm-12 col-md-4 text-center text-md-right chip-home-img">
        <div class="d-md-none">
          <img :src="image1" class="w-25" alt />
        </div>
        <div class="d-none d-md-block">
          <img :src="image1" class="img-fluid" alt />
        </div>
      </div>
      <div class="col-sm-12 col-md-8 chip-home-form">
        <h1
          class="heading-custom text-13 ls-0 line-height-2 custom-ws-nowrap mb-5 z-index-1 position-relative"
        >
          <span class="d-block position-relative">
            <span class="z-index-1 position-relative">
              <span
                class="d-inline-block appear-animation"
                data-appear-animation="fadeInLeftShorter"
                data-appear-animation-delay="1000"
              >{{ heading_1 }}</span>
            </span>
          </span>
          <strong
            class="font-weight-semibold text-3 d-inline-block appear-animation"
            data-appear-animation="fadeInLeftShorter"
            data-appear-animation-delay="1200"
          >{{ heading_2 }}</strong>
        </h1>
        <div
          class="custom-heading-input d-flex align-items-center appear-animation"
          data-appear-animation="fadeInLeftShorter"
          data-appear-animation-delay="1400"
        >
          <span class="text-color-primary font-weight-bold text-11 mr-4">
            <input
              type="tel"
              id="amount"
              v-on:input="getPrice"
              class="form-control form-control-lg"
              :placeholder="enter_amount"
              min="1"
            />
          </span>

          <button
            v-on:click="addToCart"
            :disabled="!price > 0"
            class="btn btn-primary text-nowrap btn-rounded font-weight-semibold text-4 px-4 text-uppercase py-3"
          >{{ buy_now }}!</button>
        </div>
      </div>
    </div>
    <hr class="dashed tall" />
    <div class="d-flex justify-content-between">
      <h1 class="custom-chip text-6 custom-ws-nowrap mb-0">{{ amount_of_chips }}</h1>
      <h1 class="custom-chip text-6 custom-ws-nowrap mb-0">
        <img v-if="product" :src="product.category.photo" width="22" style="margin-bottom:8px" />
        {{ (price > 0) ? amount / price : 0 | abbreviate }}
      </h1>
    </div>
    <div class="d-flex justify-content-between">
      <h1 class="custom-chip text-6 custom-ws-nowrap mb-0">{{ in_game_value }}</h1>
      <h1
        class="custom-chip text-6 custom-ws-nowrap mb-0"
      >$ {{ (price > 0) ? amount / price * 1000000 : 0 | abbreviate }}</h1>
    </div>

    <div class="text-center kampanya" v-show="kampanya_line1 || kampanya_line2">
      <h1 class="text-7 mb-0 ls-0" v-show="kampanya_line1">{{ kampanya_line1 }}</h1>
      <h1
        class="text-12 mb-0 ls-0 animated pulse infinite"
        v-show="kampanya_line2"
      >{{ kampanya_line2 }}</h1>
    </div>

    <div class="text-center">
        <p>{{ home_text }}</p>
    </div>

  </div>
</template>

<script>
import vueNumeralFilterInstaller from "vue-numeral-filter";

import AutoNumeric from "AutoNumeric";

Vue.use(vueNumeralFilterInstaller, { locale: locale });

export default {
  props: [
    "image1",
    "kampanya_line1",
    "kampanya_line2",
    "home_text",
    "amount_of_chips",
    "in_game_value",
    "buy_now",
    "enter_amount",
    "heading_1",
    "heading_2",
    "currency"
  ],

  data() {
    return {
      amount: 0,
      price: 0,
      chip: 0,
      products: [],
      product: null
    };
  },

  mounted() {
    this.getProducts();

    if (this.currency == 'TRY') {
        new AutoNumeric("#amount", AutoNumeric.getPredefinedOptions().Turkish);
    } else {
        new AutoNumeric("#amount", AutoNumeric.getPredefinedOptions().NorthAmerican);
    }
  },

  methods: {
    getProducts() {
      axios.post("/api/products").then(response => {
        this.products = response.data;
      });
    },

    getPrice() {
      this.amount = AutoNumeric.getNumber("#amount");

      let minPrice = Math.max(...[this.amount, this.getMinPrice()]);

      if (this.amount < minPrice) {
        this.price = 0;
        return;
      }

      let self = this;

      let products = this.products.filter(function(product) {
        return product.price <= self.amount;
      });

      this.product = products[products.length - 1];

      this.price =
        parseFloat(this.product.price) / parseFloat(this.product.qty);

      this.chip = this.price > 0 ? Math.round(this.amount / this.price) : 0;
    },

    getMinPrice() {
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

.kampanya .text-big {
  font-size: 5em;
  margin: 0 !important;
}

.kampanya h1:nth-child(1) {
  color: #19c5f3;
}
.kampanya h1:nth-child(2) {
  color: #19c5f3;
}

.kampanya h2,
.kampanya .text-big {
  color: #19c5f3;
}
.kampanya h1 {
  font-weight: 700;
  text-shadow: 0px 0px 5px #000000;
  /* -webkit-text-stroke: 2px rgba(0, 0, 0, 0.47); */
}
.kampanya h2 {
  font-size: 1.4em;
  background: #111113;
  padding: 0 1em;
  border-radius: 1em;
}

@media (min-width: 320px) and (max-width: 480px) {
  .kampanya {
    background-color: #0009;
    border-radius: 61px;
  }
  .kampanya h2 {
    font-size: 1em;
  }
}

@media (min-height: 320px) and (max-height: 667px) {
  .dollar-img img {
    display: none !important;
  }
}

@keyframes colorchange {
  0% {
    color: #d81b60;
  }
  25% {
    color: #fdd835;
  }
  50% {
    color: #29b6f6;
  }
  75% {
    color: #c0ca33;
  }
  100% {
    color: #d81b60;
  }
}

@-webkit-keyframes colorchange /* Safari and Chrome - necessary duplicate */ {
  0% {
    color: #d81b60;
  }
  25% {
    color: #fdd835;
  }
  50% {
    color: #29b6f6;
  }
  75% {
    color: #c0ca33;
  }
  100% {
    color: #d81b60;
  }
}
</style>
