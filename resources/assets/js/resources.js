export const GET_POST = (success,error) => {
    return axios.get('api/posts-api').then(
        response => {
<<<<<<< HEAD
=======
            // alert(response.data.id);
>>>>>>> c5790b130c69fe7e7580d6b0514952f9351bd27a
            return success(response.data);
        })
        .catch((err) => {
            return error(err);
        });
}