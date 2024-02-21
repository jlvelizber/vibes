import axios from "axios";

export const ApiServices = {
    loadDepartures: async (query: string) => {
        return await axios.get("/api/departures?query=" + query);
    },
};
