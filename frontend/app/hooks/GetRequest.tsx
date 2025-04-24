"use client";
import { useEffect, useState } from "react";

const FetchAPI = (api:string) => {
  const [getData, setGetData] = useState<[]>([]);
  const [error, setError] = useState<string>("");
  const [loading, setLoading] = useState<boolean>(true);

  useEffect(() => {
    setLoading(true)
    const fetchData = async () => {
      try {
        const response = await fetch(api);
        if (!response) {
          throw new Error(`Failed to Fetch`);
        }
        const data = await response.json()
        setGetData(data.data)
      } catch (error) {
        console.log(error);
        setError(error as string);
      }
      finally
      {
        setLoading(false)
      }
    };
    fetchData();

  }, [api]);

  return { getData, error, loading };
};

export default FetchAPI;
