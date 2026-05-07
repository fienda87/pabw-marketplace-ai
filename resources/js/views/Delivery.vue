<template>
  <div class="max-w-4xl mx-auto space-y-8 pb-20">
    <h1 class="text-3xl font-bold flex items-center gap-2">
      <Truck class="text-red-600 w-8 h-8" />
      Status Pengiriman
    </h1>
    
    <div v-if="loading" class="flex justify-center py-20">
      <Loader2 class="w-10 h-10 animate-spin text-red-600" />
    </div>

    <div v-else class="space-y-6">
      <!-- Active Orders -->
      <div v-if="activeOrders.length > 0" class="space-y-4">
        <h2 class="text-xl font-bold text-white">Pesanan Aktif</h2>
        
        <div 
          v-for="order in activeOrders" 
          :key="order.id"
          class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 space-y-6 hover:border-red-600/30 transition-all"
        >
          <!-- Order Header -->
          <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
              <p class="text-zinc-400 text-sm">Order #{{ order.id }}</p>
              <p class="text-white font-bold">{{ formatPrice(order.total_amount) }}</p>
            </div>
            <div class="flex items-center gap-2">
              <span 
                :class="getStatusColor(order.status)"
                class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider"
              >
                {{ getStatusText(order.status) }}
              </span>
            </div>
          </div>

          <!-- Shipping Info -->
          <div class="bg-zinc-800/50 rounded-xl p-4 space-y-4">
            <div class="flex items-start gap-3">
              <MapPin class="text-red-600 w-5 h-5 mt-0.5 flex-shrink-0" />
              <div>
                <p class="text-xs font-bold text-zinc-400 uppercase tracking-wider mb-1">Alamat Pengiriman</p>
                <p class="text-white">{{ order.shipping_address || 'Belum diatur' }}</p>
                <p class="text-zinc-400 text-sm">{{ order.phone || '' }}</p>
              </div>
            </div>
            
            <div class="flex items-start gap-3">
              <Clock class="text-red-600 w-5 h-5 mt-0.5 flex-shrink-0" />
              <div>
                <p class="text-xs font-bold text-zinc-400 uppercase tracking-wider mb-1">Estimasi Pengiriman</p>
                <p class="text-white">{{ getEstimatedDelivery(order.created_at, order.status) }}</p>
              </div>
            </div>

            <div v-if="order.tracking_number" class="flex items-start gap-3">
              <Package class="text-red-600 w-5 h-5 mt-0.5 flex-shrink-0" />
              <div>
                <p class="text-xs font-bold text-zinc-400 uppercase tracking-wider mb-1">Nomor Resi</p>
                <p class="text-white font-mono">{{ order.tracking_number }}</p>
              </div>
            </div>
          </div>

          <!-- Tracking Timeline -->
          <div class="space-y-3">
            <p class="text-xs font-bold text-zinc-400 uppercase tracking-wider">Status Pengiriman</p>
            <div class="relative">
              <!-- Timeline Line -->
              <div class="absolute left-[11px] top-0 bottom-0 w-0.5 bg-zinc-700"></div>
              
              <!-- Timeline Items -->
              <div class="space-y-4">
                <div class="flex items-start gap-4 relative">
                  <div class="w-6 h-6 rounded-full bg-green-600 flex items-center justify-center z-10">
                    <Check class="w-3 h-3 text-white" />
                  </div>
                  <div>
                    <p class="text-white font-bold text-sm">Pesanan Dibuat</p>
                    <p class="text-zinc-400 text-xs">{{ formatDate(order.created_at) }}</p>
                  </div>
                </div>
                
                <div class="flex items-start gap-4 relative">
                  <div 
                    :class="order.status !== 'pending' ? 'bg-green-600' : 'bg-zinc-700'"
                    class="w-6 h-6 rounded-full flex items-center justify-center z-10 transition-colors"
                  >
                    <Check v-if="order.status !== 'pending'" class="w-3 h-3 text-white" />
                  </div>
                  <div>
                    <p class="text-white font-bold text-sm">Pembayaran Dikonfirmasi</p>
                    <p class="text-zinc-400 text-xs">{{ order.status === 'pending' ? 'Menunggu pembayaran' : 'Sudah dikonfirmasi' }}</p>
                  </div>
                </div>
                
                <div class="flex items-start gap-4 relative">
                  <div 
                    :class="['processing', 'shipped'].includes(order.status) ? 'bg-green-600' : 'bg-zinc-700'"
                    class="w-6 h-6 rounded-full flex items-center justify-center z-10 transition-colors"
                  >
                    <Check v-if="['processing', 'shipped', 'delivered'].includes(order.status)" class="w-3 h-3 text-white" />
                  </div>
                  <div>
                    <p class="text-white font-bold text-sm">Diproses</p>
                    <p class="text-zinc-400 text-xs">{{ ['processing', 'shipped', 'delivered'].includes(order.status) ? 'Sedang disiapkan' : 'Menunggu diproses' }}</p>
                  </div>
                </div>
                
                <div class="flex items-start gap-4 relative">
                  <div 
                    :class="['shipped', 'delivered'].includes(order.status) ? 'bg-green-600' : 'bg-zinc-700'"
                    class="w-6 h-6 rounded-full flex items-center justify-center z-10 transition-colors"
                  >
                    <Check v-if="['shipped', 'delivered'].includes(order.status)" class="w-3 h-3 text-white" />
                  </div>
                  <div>
                    <p class="text-white font-bold text-sm">Dikirim</p>
                    <p class="text-zinc-400 text-xs">{{ ['shipped', 'delivered'].includes(order.status) ? 'Sedang dalam perjalanan' : 'Menunggu pengiriman' }}</p>
                  </div>
                </div>
                
                <div class="flex items-start gap-4 relative">
                  <div 
                    :class="order.status === 'delivered' ? 'bg-green-600' : 'bg-zinc-700'"
                    class="w-6 h-6 rounded-full flex items-center justify-center z-10 transition-colors"
                  >
                    <Check v-if="order.status === 'delivered'" class="w-3 h-3 text-white" />
                  </div>
                  <div>
                    <p class="text-white font-bold text-sm">Terkirim</p>
                    <p class="text-zinc-400 text-xs">{{ order.status === 'delivered' ? 'Pesanan sampai' : 'Menunggu pengiriman' }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="flex gap-3 pt-4 border-t border-zinc-800">
            <router-link 
              :to="'/orders/' + order.id"
              class="flex-1 text-center bg-zinc-800 hover:bg-zinc-700 text-white px-4 py-3 rounded-xl font-bold text-sm transition-colors"
            >
              Lihat Detail
            </router-link>
            <button 
              v-if="['shipped'].includes(order.status)"
              class="flex-1 bg-red-600 hover:bg-red-700 text-white px-4 py-3 rounded-xl font-bold text-sm transition-colors"
            >
              Lacak Paket
            </button>
          </div>
        </div>
      </div>

      <!-- No Active Orders -->
      <div v-else class="bg-zinc-900 border border-zinc-800 rounded-2xl p-12 text-center">
        <Truck class="w-16 h-16 text-zinc-700 mx-auto mb-4" />
        <h3 class="text-xl font-bold text-white mb-2">Tidak Ada Pesanan Aktif</h3>
        <p class="text-zinc-400 mb-6">Kamu belum memiliki pesanan yang sedang dikirim.</p>
        <router-link 
          to="/"
          class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl font-bold transition-colors"
        >
          <ShoppingBag class="w-5 h-5" />
          Mulai Belanja
        </router-link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { 
  Truck, 
  Loader2, 
  MapPin, 
  Clock, 
  Package, 
  Check, 
  ShoppingBag 
} from 'lucide-vue-next';
import axios from 'axios';

const loading = ref(true);
const activeOrders = ref([]);

const formatPrice = (price) => {
  return new Intl.NumberFormat('id-ID').format(price);
};

const formatDate = (date) => {
  return new Date(date).toLocaleDateString('id-ID', {
    day: 'numeric',
    month: 'long',
    year: 'numeric',
    hour: '2-digit',
    minute: '2-digit'
  });
};

const getStatusText = (status) => {
  const statusMap = {
    pending: 'Menunggu Pembayaran',
    processing: 'Diproses',
    shipped: 'Dikirim',
    delivered: 'Terkirim',
    cancelled: 'Dibatalkan'
  };
  return statusMap[status] || status;
};

const getStatusColor = (status) => {
  const colorMap = {
    pending: 'bg-yellow-600/20 text-yellow-500 border border-yellow-600/30',
    processing: 'bg-blue-600/20 text-blue-500 border border-blue-600/30',
    shipped: 'bg-purple-600/20 text-purple-500 border border-purple-600/30',
    delivered: 'bg-green-600/20 text-green-500 border border-green-600/30',
    cancelled: 'bg-red-600/20 text-red-500 border border-red-600/30'
  };
  return colorMap[status] || 'bg-zinc-600/20 text-zinc-500 border border-zinc-600/30';
};

const getEstimatedDelivery = (orderDate, status) => {
  if (status === 'delivered') {
    return 'Sudah sampai';
  }
  
  const date = new Date(orderDate);
  const estimated = new Date(date.getTime() + 3 * 24 * 60 * 60 * 1000); // +3 days
  
  return estimated.toLocaleDateString('id-ID', {
    day: 'numeric',
    month: 'long',
    year: 'numeric'
  }) + ' (Estimasi 2-4 hari kerja)';
};

const fetchActiveOrders = async () => {
  loading.value = true;
  try {
    const response = await axios.get('/api/orders');
    // Filter for active orders (not delivered or cancelled)
    activeOrders.value = (response.data.data || response.data).filter(
      order => !['delivered', 'cancelled'].includes(order.status)
    );
  } catch (error) {
    console.error('Failed to fetch orders', error);
    activeOrders.value = [];
  } finally {
    loading.value = false;
  }
};

onMounted(() => {
  fetchActiveOrders();
});
</script>
