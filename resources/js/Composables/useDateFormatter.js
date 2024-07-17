const useDateFormatter = () => {
    const formatDate = (deadline) => {
        const dateObj = new Date(deadline);

        const formattedDate = `
            ${dateObj.getDate()}/${String(dateObj.getMonth() + 1).padStart(
            2,
            "0"
        )}/${String(dateObj.getFullYear()).slice(-2)}
        `;

        const hours = String(dateObj.getHours()).padStart(2, "0");
        const minutes = String(dateObj.getMinutes()).padStart(2, "0");

        return `${formattedDate} ${hours}h${minutes}`;
    };

    return {
        formatDate,
    };
};

export default useDateFormatter;
