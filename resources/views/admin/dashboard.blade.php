<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.partials.header')
</head>

<body class="bg-[#fafafa]">

    <div class="flex">

        @include('admin.partials.sidebar')

        <!-- Main -->
        <main class="ml-64 flex-1 p-8">

            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-2xl font-bold">Dashboard</h2>
                    <p class="text-gray-500 text-sm">Overview your store performance</p>
                </div>

                <button class="pink-gradient text-white px-6 py-2 rounded-xl pink-glow hover:scale-105 transition">
                    + Add Product
                </button>
            </div>

            <!-- KPI -->
            <div class="grid grid-cols-4 gap-6 mb-8">

                <div class="bg-white p-6 rounded-2xl pink-glow hover:scale-[1.03] transition">
                    <p class="text-gray-500 text-sm">Revenue</p>
                    <h3 class="text-2xl font-bold mt-2">Rp 125M</h3>
                    <span class="text-pink-600 text-sm">+12%</span>
                </div>

                <div class="bg-white p-6 rounded-2xl pink-glow hover:scale-[1.03] transition">
                    <p class="text-gray-500 text-sm">Orders</p>
                    <h3 class="text-2xl font-bold mt-2">1,240</h3>
                    <span class="text-pink-600 text-sm">+8%</span>
                </div>

                <div class="bg-white p-6 rounded-2xl pink-glow hover:scale-[1.03] transition">
                    <p class="text-gray-500 text-sm">Conversion</p>
                    <h3 class="text-2xl font-bold mt-2">3.4%</h3>
                    <span class="text-red-400 text-sm">-0.5%</span>
                </div>

                <div class="bg-white p-6 rounded-2xl pink-glow hover:scale-[1.03] transition">
                    <p class="text-gray-500 text-sm">AI Images</p>
                    <h3 class="text-2xl font-bold mt-2">5,320</h3>
                    <span class="text-pink-600 text-sm">+25%</span>
                </div>

            </div>

            <!-- Highlight -->
            <div class="pink-gradient text-white p-6 rounded-2xl mb-8 pink-glow">
                <h3 class="text-lg font-semibold">AI Boost Insight</h3>
                <p class="text-sm opacity-90 mt-1">
                    Products with AI images convert 18% higher than standard images
                </p>
            </div>

            <!-- Charts -->
            <div class="grid grid-cols-2 gap-6 mb-8">

                <div class="bg-white p-6 rounded-2xl">
                    <h3 class="font-semibold mb-4">Revenue Overview</h3>
                    <div class="h-40 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                        Chart Placeholder
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl">
                    <h3 class="font-semibold mb-4">AI Usage</h3>
                    <div class="h-40 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                        Chart Placeholder
                    </div>
                </div>

            </div>

            <!-- Table -->
            <div class="bg-white p-6 rounded-2xl mb-8">
                <h3 class="font-semibold mb-4">Top Products</h3>

                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-gray-400 text-left">
                            <th class="pb-3">Product</th>
                            <th>Sales</th>
                            <th>Revenue</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="border-t">
                            <td class="py-3">Sneakers White</td>
                            <td>320</td>
                            <td>Rp 48M</td>
                            <td><span class="text-pink-600 font-medium">Active</span></td>
                        </tr>

                        <tr class="border-t">
                            <td class="py-3">Hoodie Black</td>
                            <td>210</td>
                            <td>Rp 31M</td>
                            <td><span class="text-pink-600 font-medium">Active</span></td>
                        </tr>

                        <tr class="border-t">
                            <td class="py-3">Cap Streetwear</td>
                            <td>150</td>
                            <td>Rp 12M</td>
                            <td><span class="text-gray-400">Draft</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- AI Activity -->
            <div class="bg-white p-6 rounded-2xl">
                <h3 class="font-semibold mb-4">AI Activity</h3>

                <ul class="space-y-3 text-sm">
                    <li class="flex justify-between">
                        <span>Generated 5 images for Sneakers</span>
                        <span class="text-gray-400">2 min ago</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Generated description for Hoodie</span>
                        <span class="text-gray-400">10 min ago</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Generated 8 images for Cap</span>
                        <span class="text-gray-400">30 min ago</span>
                    </li>
                </ul>
            </div>

        </main>

    </div>

</body>

</html>
