"use client";
import Sidebar from "@/app/Application/Components/Sidebar";
import FetchAPI from "@/app/hooks/GetRequest";
import { TProductProps } from "@/app/Types/AllTypes";

const ProductCard = ({
  imageUrl,
  name,
  description,
  size,
  price,
}: {
  imageUrl: string;
  name: string;
  description?: string;
  size: string;
  price: number;
}) => (
  <div className="rounded-lg p-6 flex items-center bg-gradient-to-r from-[#FE5196] to-[#F77062] border border-pink-200 w-fit">
    <div
      className="w-24 h-24 rounded-full overflow-hidden mr-4"
      style={{
        backgroundImage: `url(${imageUrl})`,
        backgroundSize: "cover",
        backgroundPosition: "center",
      }}
    />
    <div className="flex flex-col">
      <h2 className="text-lg font-semibold text-white">{name}</h2>
      {description && <p className="text-sm text-white mt-1">{description}</p>}
      <p className="text-sm text-white mt-1">Size: {size}</p>
      <p className="text-md font-semibold text-white mt-2">₱{price}</p>
    </div>
  </div>
);

const Menu = () => {
  const { getData } = FetchAPI("http://127.0.0.1:8000/api/products");
  console.log(getData);

  const Categories = [
    { id: 1, category: "Scramble" },
    { id: 2, category: "Shakes" },
    { id: 3, category: "Drink" },
    { id: 4, category: "Bites" },
  ]

  return (
    <div className="flex min-h-screen">
      <aside className="mr-20 w-1/8">
        <Sidebar />
      </aside>

      <main className="flex-grow flex flex-col h-screen">
        <header className="sticky top-0 z-30 bg-white py-6 px-4 sm:px-8">
          <h1 className="text-4xl sm:text-5xl font-bold text-pink-500 mb-4">
            MENU
          </h1>
          <nav className="flex gap-3 sm:gap-6 overflow-x-auto">
            {Categories.map((item) => {
              return (
                <a
                  key={item.id}
                  href={`#${decodeURIComponent(item.category)}`}
                  className="py-2 px-4 sm:px-5 border rounded-full bg-white font-bold text-pink-400 hover:bg-gradient-to-r from-[#FE5196] to-[#F77062] hover:text-white transition-colors"
                >
                  {item.category}
                </a>
              );
            })}
          </nav>
        </header>

        <section className="flex-1 overflow-y-auto bg-white px-4 sm:px-8 py-8 space-y-20">
          {getData
            .filter((product: TProductProps) => product.Category === "Scramble")
            .map((product: TProductProps) => {
              return (
                <div key={product.Itemcode} id={product.Category}>
                  <h2 className="text-2xl font-bold text-pink-500 mb-6 text-left">
                    {product.Item_Name}
                  </h2>
                  <div className="flex flex-wrap gap-6">
                    <ProductCard
                      key={product.Itemcode}
                      imageUrl={`http://127.0.0.1:8000/api/storage/${product.Image}`}
                      name={product.Item_Name}
                      description={product.Description}
                      size={''}
                      price={product.Unit_Price}
                    />
                  </div>
                </div>
              );
            })}

          {getData
            .filter((product: TProductProps) => product.Category === "Shakes")
            .map((product: TProductProps) => {
              return (
                <div key={product.Itemcode} id={product.Category}>
                  <h2 className="text-2xl font-bold text-pink-500 mb-6 text-left">
                    {product.Item_Name}
                  </h2>
                  <div className="flex flex-wrap gap-6">
                    <ProductCard
                      key={product.Itemcode}
                      imageUrl={`http://127.0.0.1:8000/api/storage/${product.Image}`}
                      name={product.Item_Name}
                      description={product.Description}
                      size={product.Item_Name}
                      price={product.Unit_Price}
                    />
                  </div>
                </div>
              );
            })}

          {getData
            .filter((product: TProductProps) => product.Category === "Drink")
            .map((product: TProductProps) => {
              return (
                <div key={product.Itemcode} id={product.Category}>
                  <h2 className="text-2xl font-bold text-pink-500 mb-6 text-left">
                    {product.Item_Name}
                  </h2>
                  <div className="flex flex-wrap gap-6">
                    <ProductCard
                      key={product.Itemcode}
                      imageUrl={`http://127.0.0.1:8000/api/storage/${product.Image}`}
                      name={product.Item_Name}
                      description={product.Description}
                      size={product.Item_Name}
                      price={product.Unit_Price}
                    />
                  </div>
                </div>
              );
            })}

          {getData
            .filter((product: TProductProps) => product.Category === "Bites")
            .map((product: TProductProps) => {
              return (
                <div key={product.Itemcode} id={product.Category}>
                  <h2 className="text-2xl font-bold text-pink-500 mb-6 text-left">
                    {product.Item_Name}
                  </h2>
                  <div className="flex flex-wrap gap-6">
                    <ProductCard
                      key={product.Itemcode}
                      imageUrl={`http://127.0.0.1:8000/api/storage/${product.Image}`}
                      name={product.Item_Name}
                      description={product.Description}
                      size={product.Item_Name}
                      price={product.Unit_Price}
                    />
                  </div>
                </div>
              );
            })}
        </section>
      </main>
    </div>
  );
};

export default Menu;
