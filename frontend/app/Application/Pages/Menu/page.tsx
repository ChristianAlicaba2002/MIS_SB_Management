"use client";
import Sidebar from "@/app/Application/Components/Sidebar";
import Image from "next/image";
import FetchAPI from "@/app/hooks/GetRequest";
import { TProductProps } from "@/app/Types/AllTypes";
import Link from "next/link";
const ProductCard = ({
  imageUrl,
  title,
  price,
}: {
  imageUrl: string;
  title: string;
  price: number | string;
}) => {
  return (
    <div className="rounded-lg p-8 flex flex-col items-center justify-start relative bg-white w-fit shadow-pink-300 shadow-md">
      <div className="w-32 h-32 rounded-full flex items-center justify-center absolute top-0 right-0 transform translate-x-1/4 -translate-y-1/4 bg-white border-1 border-pink-300 shadow-pink-400 shadow">
        <div
          className="w-full h-full rounded-full overflow-hidden p-1"
          style={{
            backgroundImage: `url(${imageUrl})`,
            backgroundSize: "contain",
            backgroundRepeat: "no-repeat",
            backgroundPosition: "center",
          }}
        />
      </div>
      <div className="mt-20 text-center">
        <h2 className="text-xl font-semibold text-pink-700">{title}</h2>
        <p className="text-2xl font-bold mt-3 text-red-700">&#8369;{price}</p>
      </div>
    </div>
  );
};

const Menu = () => {
  const { getData } = FetchAPI("http://127.0.0.1:8000/api/products");

  return (
    <div className="flex bg-white">
      <aside>
        <Sidebar />
      </aside>

      <div className="flex-grow bg-white">
        <nav className="sticky top-0 z-50 bg-gradient-to-r from-[#F77062]/40 to-[#FE5196]/90 text-white shadow-md py-2 px-0 w-[70%] mx-auto flex justify-around items-center text-xl font-bold rounded-b-3xl shadow-pink-300">
          <a
            href="#icecream"
            className="hover:scale-110 transition-transform flex flex-col items-center gap-2"
          >
            <Image
              src="/img/shaved-icee.png"
              alt="Ice Scramble"
              className="w-12 h-12 object-contain"
              width={50}
              height={30}
            />
            <span className="font-playfair text-lg">Scramble</span>
          </a>
          <a
            href="#shakes"
            className="hover:scale-110 transition-transform flex flex-col items-center gap-2"
          >
            <Image
              src="/img/shake.png"
              alt="Shakes"
              className="w-12 h-12 object-contain"
              width={50}
              height={30}
            />
            <span className="font-playfair text-lg">Shakes</span>
          </a>
          <a
            href="#drinks"
            className="hover:scale-110 transition-transform flex flex-col items-center gap-2"
          >
            <Image
              src="/img/drink.png"
              alt="Drinks"
              className="w-12 h-12 object-contain"
              width={50}
              height={30}
            />
            <span className="font-playfair text-lg">Drinks</span>
          </a>
          <a
            href="#bites"
            className="hover:scale-110 transition-transform flex flex-col items-center gap-2"
          >
            <Image
              src="/img/bites.png"
              alt="Bites"
              className="w-12 h-12 object-contain"
              width={50}
              height={30}
            />
            <span className="font-playfair text-lg">Bites</span>
          </a>
        </nav>

        <div className="text-center py-40 px-8 ">
          <h1 className="text-center text-7xl font-playfair font-black bg-gradient-to-br from-[#F77062] to-[#FE5196] text-transparent bg-clip-text shadow-pink-800">
            ⋆꙳•̩̩͙❅*̩̩͙‧͙ Sweet Delights ‧͙*̩̩͙❆ ͙͛ ˚₊⋆
          </h1>
          <p className="mt-8 text-xl text-pink-600">
            Indulge in our delightful selection of frozen treats, rich shakes,
            refreshing drinks, and sweet bites!
          </p>
        </div>

        {/* Ice Scramble Section */}
        <section id="icecream" className="py-40 px-8">
          <h2 className="text-6xl font-playfair font-bold mb-12 text-center text-pink-700 ">
            Ice Scramble ❄༄.°
          </h2>
          <main className="mx-auto w-[95%] flex flex-wrap justify-center gap-20 ">
            {getData
              .filter((items: TProductProps) => items.Category == "Scramble")
              .map((item: TProductProps) => {
                const imageURL = `http://127.0.0.1:8000/api/storage/${item.Image}`;
                return (
                  <div key={item.Itemcode}>
                    <ProductCard
                      imageUrl={imageURL}
                      title={item.Item_Name}
                      price={item.Unit_Price}
                    />
                  </div>
                );
              })}
          </main>
        </section>

        {/* Shakes Section */}
        <section id="shakes" className="py-40 px-8">
          <h2 className="text-6xl font-playfair font-bold mb-12 text-center text-pink-700">
            Shakes ❄༄.°
          </h2>
          <main className="mx-auto w-[95%] flex flex-wrap justify-center gap-20">
            {getData
              .filter((items: TProductProps) => items.Category == "Shakes")
              .map((item: TProductProps) => {
                const imageURL = `http://127.0.0.1:8000/api/storage/${item.Image}`;
                return (
                  <div key={item.Itemcode}>
                    <ProductCard
                      imageUrl={imageURL}
                      title={item.Item_Name}
                      price={item.Unit_Price}
                    />
                    <Link href={``} />
                  </div>
                );
              })}
          </main>
        </section>

        {/* Drinks Section */}
        <section id="drinks" className="py-40 px-8">
          <h2 className="text-6xl font-playfair font-bold mb-12 text-center text-pink-700">
            Refreshing Drinks ❄༄.°
          </h2>
          <main className="mx-auto w-[95%] flex flex-wrap justify-center gap-20">
          {getData
              .filter((items: TProductProps) => items.Category == "Drink")
              .map((item: TProductProps) => {
                const imageURL = `http://127.0.0.1:8000/api/storage/${item.Image}`;
                return (
                  <div key={item.Itemcode}>
                    <ProductCard
                      imageUrl={imageURL}
                      title={item.Item_Name}
                      price={item.Unit_Price}
                    />
                    <Link href={``} />
                  </div>
                );
              })}
          </main>
        </section>

        <section id="bites" className="py-24 px-8">
          <h2 className="text-6xl font-playfair font-bold mb-12 text-center text-pink-700">
            Sweet Bites ❄༄.°
          </h2>
          <main className="mx-auto w-[95%] flex flex-wrap justify-center gap-20">
          {getData
              .filter((items: TProductProps) => items.Category == "Bites")
              .map((item: TProductProps) => {
                const imageURL = `http://127.0.0.1:8000/api/storage/${item.Image}`;
                return (
                  <div key={item.Itemcode}>
                    <ProductCard
                      imageUrl={imageURL}
                      title={item.Item_Name}
                      price={item.Unit_Price}
                    />
                    <Link href={``} />
                  </div>
                );
              })}
          </main>
        </section>
      </div>
    </div>
  );
};

export default Menu;
