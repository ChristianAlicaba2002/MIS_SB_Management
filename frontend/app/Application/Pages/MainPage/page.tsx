"use client";

import React, { useEffect, useState } from "react";
import Sidebar from "@/app/Application/Components/Sidebar";
import Image from "next/image";

const products = [
  {
    name: "Strawberry Scramble",
    price: "₱35.00",
    image: "/img/Strawberry.png",
  },
  {
    name: "Choco Scramble",
    price: "₱40.00",
    image: "/img/Chocolate.png",
  },
  {
    name: "Oreo Graham Bar",
    price: "₱60.00",
    image: "/img/OreoGrahamBar.png",
  },
];

const MainPage = () => {

  return (
    <>
      <Sidebar />
      <div className="ml-20 md:ml-64 p-6 min-h-screen font-['Playfair_Display'] transition-all duration-500">
        <h1 className="text-4xl md:text-5xl font-bold text-center bg-gradient-to-r from-[#F77062] to-[#FE5196] bg-clip-text text-transparent mb-10 mt-4">
          Welcome to MIS&SB
        </h1>

        <section className="mt-8">
          <h2 className="text-2xl md:text-3xl font-semibold text-center text-[#F77062] mb-6">
            People's Top Favorite ⋆｡‧˚❆☃️❆˚‧｡⋆
          </h2>
          <div className="mt-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 px-4 md:px-10">

            {products.length > 1 ? products
              .filter((product) => product.Unit_Price >= 30)
              .map((item) => {
                return (
                  <div
                    key={item.name}
                    className=" bg-gradient-to-br from-[#FFF0E6] to-[#FFF3F5] shadow-pink-200 rounded-3xl shadow-md hover:shadow-pink-400 transition duration-300 p-4 text-center hover:scale-105"
                  >
                    <Image
                      src={`http://127.0.0.1:8000/api/storage/${item.image}`}
                      alt={item.name}
                      
            {product.length > 1 ? product
              .filter((product: TProductProps) => product.Unit_Price >= 30)
              .map((item: TProductProps) => {
                return (
                  <div
                    key={item.Itemcode}
                    className=" bg-gradient-to-br from-[#FFF0E6] to-[#FFF3F5] shadow-pink-200 rounded-3xl shadow-md hover:shadow-pink-400 transition duration-300 p-4 text-center hover:scale-105"
                  >
                    <Image
                      src={`http://127.0.0.1:8000/api/storage/${item.Image}`}
                      alt={item.Item_Name}
                      width={150}
                      height={100}
                      className="rounded-2xl mx-auto mb-4"
                    />
                    <h3 className="text-lg font-bold text-[#FE5196]">

                      {item.name}
                    </h3>
                    <p className="text-lg font-bold text-gray-500">
                      {item.price}

                      {item.Item_Name}
                    </h3>
                    <p className="text-lg font-bold text-gray-500">
                      {item.Unit_Price}
                    </p>
                  </div>
                );
              }): 'No Top Favorite yet'}
              
          </div>
        </section>
      </div>
    </>
  );
};

export default MainPage;
