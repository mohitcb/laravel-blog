export const GET_POST = (success,error) => {
    return axios.get('api/posts-api').then(
        response => {
            // alert(response.data.id);
            return success(response.data);
        })
        .catch((err) => {
            return error(err);
        });
}