"use client";
import { TProductProps } from "@/app/Types/AllTypes";
import { useParams } from "next/navigation";
import React, { useEffect, useState } from "react";
import Image from "next/image";

const ProductDetail = () => {
  const [product, setProduct] = useState<TProductProps[]>([]);
  const { id } = useParams();

  useEffect(() => {
    const fetchData = async () => {
      const response = await fetch(`http://127.0.0.1:8000/api/products/${id}`);

      try {
        if (!response.ok) {
          throw new Error(`Failed to fetch ${response.ok}`);
        }
        const data = await response.json();
        if (Array.isArray(data.data)) {
          console.log(data.data);
          setProduct(data.data);
        }
      } catch (error) {
        console.log(error);
      }
    };
    fetchData();
  }, []);

  return (
    <>
      <div>
        {product.map((item: TProductProps) => {
          return (
            <div key={item.Itemcode}>
              <Image
                src={`http://127.0.0.1:8000/api/storage/${item.Image}`}
                width={150}
                height={150}
                alt={item.Item_Name}
                priority
              />
              <h1>{item.Item_Name}</h1>
              <span>&#8369;{item.Unit_Price}</span><br />
              <label htmlFor="">Sizes</label><br />
              <span>{item.Sizes}</span>
              <label htmlFor="">Setting</label><br />
              <label htmlFor="">{item.Setting}</label>
              <p>{item.Description}</p>
            </div>
          );
        })}
      </div>
    </>
  );
};

export default ProductDetail;
